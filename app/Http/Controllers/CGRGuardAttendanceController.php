<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

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

    	$clientID = DB::table('tblcgrm')
    		->select('intClientID')
    		->where('intCgrmID', $cgrmID)
    		->first();
    	
    	$guardID = DB::table('tblclient')
    		->join('tblcontract', 'tblcontract.intClientID', '=','tblclient.intClientID')
    		->join('tblclientguard' ,'tblclientguard.intContractID', '=','tblcontract.intContractID')
    		->join('tblguard', 'tblguard.intGuardID', '=','tblclientguard.intGuardID')
    		->select('tblguard.intGuardID')
    		->where('tblclient.intClientID', $clientID->intClientID)
    		->groupBy('tblclientguard.intGuardID')
    		->get();

    	$clientGuard = array();
    	foreach($guardID as $value){
    		$result = DB::table('tblclientguard')
    			->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
    			->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
    			->select('tblguard.strFirstName','tblguard.strLastName', 'tblguardlicense.strLicenseNumber','tblguard.intGuardID', 'tblclientguard.boolStatus')
    			->where('tblclientguard.intGuardID' ,$value->intGuardID)
    			->where('tblclientguard.created_at', '<', $now)
    			->orderBy('tblclientguard.created_at', 'desc')
    			->first();

			if ($result->boolStatus == 1 || $result->boolStatus == 3){
				$resultAttendance = DB::table('tblattendance')
					->select('datetimeIn', 'datetimeOut')
					->where('intGuardID', $value->intGuardID)
					->where('intClientID', $clientID->intClientID)
					->orderBy('datetimeIn', 'desc')
					->first();

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
    }

    public function timeOut(Request $request){
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
    }
}
