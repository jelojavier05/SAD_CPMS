<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\App; 

class CGRGuardAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        return view('/CGR/CGRGuardAttendance');
    }

    public function getActiveGuard(Request $request){
    	$cgrmID = $request->session()->get('id');
    	$now = Carbon::now();

    	$client = DB::table('tblcgrm')
            ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblcgrm.intClientID')
            ->select('tblcgrm.intClientID', 'tblcontract.intContractID')
            ->where('intCgrmID', $cgrmID)
            ->where('tblcontract.boolStatus', 1)
            ->first();

        $guardID = DB::table('tblclientguard')
            ->select('intGuardID')
            ->where('intContractID', $client->intContractID)
            ->groupBy('intGuardID')
            ->get();


    	$clientGuard = array();

    	foreach($guardID as $value){
    		$result = DB::table('tblcontract')    
                ->join('tblclientguard', 'tblclientguard.intContractID', '=', 'tblcontract.intContractID')
    			->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
    			->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
    			->select('tblguard.strFirstName','tblguard.strLastName', 'tblguardlicense.strLicenseNumber','tblguard.intGuardID', 'tblclientguard.boolStatus')
    			->where('tblclientguard.intGuardID', $value->intGuardID)
                ->where('tblclientguard.intContractID', $client->intContractID)
    			->where('tblclientguard.created_at', '<=', $now)
    			->orderBy('tblclientguard.created_at', 'desc')
    			->first();
                
            $resultAttendance = DB::table('tblattendance')
                ->select('datetimeIn', 'datetimeOut')
                ->where('intGuardID', $value->intGuardID)
                ->where('intClientID', $client->intClientID)
                ->orderBy('datetimeIn', 'desc')
                ->first();

            if (!is_null($resultAttendance) && 
                (!is_null($resultAttendance->datetimeIn) && $resultAttendance->datetimeOut == '0000-00-00 00:00:00')){
                $result->boolStatus = 3;
            }

			if (!is_null($result) && ($result->boolStatus == 1 || $result->boolStatus == 3)){

				if (is_null($resultAttendance)){
					$result->timeIn = null;
				}else{
					if ($resultAttendance->datetimeOut == '0000-00-00 00:00:00'){
						$result->timeIn = date('M d h:i A', strtotime($resultAttendance->datetimeIn)); 
					}else{
						$result->timeIn = null;
					}
				}
		  		array_push($clientGuard, $result);
			}

    	}
        
    	return response()->json($clientGuard);
    }//get active guard in the cgrm

    public function login(Request $request){
    	$username = $request->username;
    	$password = $request->password;
    	$guardID = $request->intGuardID;

    	$account = DB::table('tblaccount')
		    ->select('intAccountID')
		    ->where('strUsername', '=', $username)
		    ->where('strPassword', '=', $password)
		    ->first();
		if (is_null($account)){
            return response()->json(false);
        }else{
        	$result = DB::table('tblguard')
        		->select('intAccountID')
        		->where('intGuardID', $guardID)
        		->first();

        	if ($result->intAccountID == $account->intAccountID){
        		return response()->json(true);	
        	}else{
        		return response()->json(false);
        	}
        	
        }
    }

    public function timeIn (Request $request){
    	try{
            DB::beginTransaction();
            $guardID = $request->intGuardID;
            $cgrmID = $request->session()->get('id');
            $now = Carbon::now();

            $result = DB::table('tblcgrm')
                ->select('intClientID')
                ->where('intCgrmID', $cgrmID)
                ->first();
            $clientID = $result->intClientID;

            DB::table('tblattendance')
                ->insert([
                    'intGuardID' => $guardID,
                    'intClientID' => $clientID,
                    'datetimeIn' => $now
                ]);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function timeOut(Request $request){
        try{
            DB::beginTransaction();
            $guardID = $request->intGuardID;
            $cgrmID = $request->session()->get('id');
            $now = Carbon::now();

            $result = DB::table('tblcgrm')
                ->select('intClientID')
                ->where('intCgrmID', $cgrmID)
                ->first();
            $clientID = $result->intClientID;

            $result = DB::table('tblattendance')
                ->select('intAttendanceID', 'datetimeIn')
                ->where('intGuardID', $guardID)
                ->where('intClientID', $clientID)
                ->orderBy('datetimeIn', 'desc')
                ->first();
            $attendanceID = $result->intAttendanceID;
            $datetimeIn = new Carbon($result->datetimeIn);
            
            $dateDifference = $datetimeIn->diffInMinutes($now);
            $dateDifference = $dateDifference * (1/60);
            
            DB::table('tblattendance')
                ->where('intAttendanceID', $attendanceID)
                ->update([
                    'datetimeOut' => $now,
                    'deciTotalHours' => $dateDifference
                ]);

            $pusher = App::make('pusher');
            $pusher->trigger(
                'attendance',
                'guard-attendance', 
                array('text' => 'Time Out')
            );
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
        	
    }

    public function attendanceLog(Request $request){
        $cgrmID = $request->session()->get('id');
        $now = Carbon::now();

        $result = DB::table('tblcgrm')
            ->select('intClientID')
            ->where('intCgrmID', $cgrmID)
            ->first();
        $clientID = $result->intClientID;
    
        $timeIn = DB::table('tblattendance')
            ->select('datetimeIn', 'intGuardID')
            ->where('intClientID', $clientID)
            ->get();

        $timeOut = DB::table('tblattendance')
            ->select('datetimeOut', 'intGuardID')
            ->where('intClientID', $clientID)
            ->get();

        $attendanceLog = array(); 
        foreach ($timeIn as $value){
            $guardName = DB::table('tblguard')
                ->select('strFirstName', 'strLastName')
                ->where('intGuardID', $value->intGuardID)
                ->first();

            $attendance = new \stdClass();
            $attendance->guardName = $guardName->strFirstName . ' ' . $guardName->strLastName;
            $attendance->dateTimeIn = $value->datetimeIn;
            $attendance->identifier = 1;
            $attendance->dateTime = date('M d - H:i', strtotime($attendance->dateTimeIn)); 

            // array_push($attendanceLog, $attendance);
            $attendanceLog [$value->datetimeIn] = $attendance;
        }

        foreach($timeOut as $value){
            $guardName = DB::table('tblguard')
                ->select('strFirstName', 'strLastName')
                ->where('intGuardID', $value->intGuardID)
                ->first();

            if (!($value->datetimeOut == '0000-00-00 00:00:00')){
                $attendance = new \stdClass();
                $attendance->guardName = $guardName->strFirstName . ' ' . $guardName->strLastName;
                $attendance->dateTimeOut = $value->datetimeOut;
                $attendance->identifier = 0;
                $attendance->dateTime = date('M d - H:i', strtotime($attendance->dateTimeOut)); 

                // array_push($attendanceLog, $attendance);
                $attendanceLog [$value->datetimeOut] = $attendance;
            }
        }
        krsort($attendanceLog);
        return response()->json($attendanceLog);
    }//attendance log
}
