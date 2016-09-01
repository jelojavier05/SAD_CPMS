<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class SecurityLeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $id = $request->session()->get('id');
        $now = Carbon::now();
        
        $guard = DB::table('tblguard')
            ->join('tblguardstatus', 'tblguardstatus.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblguardstatus.intStatusIdentifier')
            ->where('tblguard.intGuardID', '=', $id)
            ->where('tblguardstatus.dateEffectivity','<', $now)
            ->orderBy('tblguardstatus.dateEffectivity', 'desc')
            ->first();

        if ($guard->intStatusIdentifier == 2){
            $accountID = $request->session()->get('accountID');
            $arrLeaveID = DB::table('tblleave')->get();
            $guardInformation = DB::table('tblguard')
                ->select('intGuardID', 'strFirstName', 'strLastName')
                ->where('intAccountID', $accountID)
                ->first();

            $guardLeaveLogResult = DB::table('tblguardleaverequest')
                ->join('tblleave', 'tblleave.intLeaveID', '=', 'tblguardleaverequest.intLeaveID')
                ->select('tblguardleaverequest.dateStart', 'tblguardleaverequest.dateEnd','tblguardleaverequest.boolStatus', 'tblleave.strLeaveType')
                ->where('intGuardID', $guardInformation->intGuardID)
                ->orderBy('dateStart', 'desc')
                ->get();

            $guardLeave = array();
            foreach($arrLeaveID as $value){
                $result = DB::table('tblguardleave')
                    ->join('tblleave', 'tblleave.intLeaveID', '=','tblguardleave.intLeaveID')
                    ->select('tblguardleave.*', 'tblleave.strLeaveType')
                    ->where('intGuardID',$guardInformation->intGuardID)
                    ->where('tblguardleave.intLeaveID',$value->intLeaveID)
                    ->orderBy('intGuardLeaveID','desc')
                    ->first();
                if (!is_null($result)){
                    $result->intNotificationPeriod = $value->intNotificationPeriod;
                    array_push($guardLeave, $result);
                }
            }

            $guardLeaveLog = array();
            foreach($guardLeaveLogResult as $value){
                $value->dateStartFormat = date('M d', strtotime($value->dateStart));    
                $value->dateEndFormat = date('M d', strtotime($value->dateEnd));    

                $boolStatus = $value->boolStatus;

                if ($boolStatus == 0){
                    $value->strStatus = 'Rejected';
                }else if ($boolStatus == 1){
                    $value->strStatus = 'Pending';
                }else if ($boolStatus == 2){
                    $value->strStatus = 'Accepted';
                }

                array_push($guardLeaveLog, $value);
            }

            

            return view('/securityguard/SecurityLeaveRequest')
                ->with('guardInformation', $guardInformation)
                ->with('guardLeaveLog', $guardLeaveLog)
                ->with('guardLeave', $guardLeave);
        }else{
            return redirect('/securityHome');
        }
    }

    public function postLeaveRequest(Request $request){
        try{
            DB::beginTransaction();
            $accountID = $request->session()->get('accountID');
            $result = DB::table('tblguard')
                ->select('intGuardID')
                ->where('intAccountID',$accountID)
                ->first();
            $guardID = $result->intGuardID;

            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $adminID = $result->intAccountID;

            $inboxID = DB::table('tblinbox')
                ->insertGetId([
                    'intAccountIDSender' => $accountID,
                    'intAccountIDReceiver' => $adminID,
                    'strSubject' => 'Leave Request',
                    'tinyintType' => 3
                ]);

            DB::table('tblguardleaverequest')
                ->insert([
                    'intGuardID' => $guardID,
                    'intLeaveID' => $request->intLeaveID,
                    'intInboxID' => $inboxID,
                    'strReason' => $request->strReason,
                    'dateStart' => $request->dateStart,
                    'dateEnd' => $request->dateEnd,
                    'boolStatus' => 1
                ]);
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function guardStatus(Request $request){

        $guardID = $request->session()->get('id');
        $now = Carbon::now();
        
        $guard = DB::table('tblguard')
            ->join('tblguardstatus', 'tblguardstatus.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblguardstatus.intStatusIdentifier')
            ->where('tblguard.intGuardID', '=', $guardID)
            ->where('tblguardstatus.dateEffectivity','<', $now)
            ->orderBy('tblguardstatus.dateEffectivity', 'desc')
            ->first();

        $countActiveLeaveRequest = DB::table ('tblguardleaverequest')
            ->where('intGuardID', $guardID)
            ->where('boolStatus', 1)
            ->count();// checking if there's still existing leave 

        $guard->countActiveLeaveRequest = $countActiveLeaveRequest;
        
        return response()->json($guard);
    }
}
