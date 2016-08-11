<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SecurityLeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $accountID = $request->session()->get('accountID');
        $arrLeaveID = DB::table('tblleave')->get();
        $guardInformation = DB::table('tblguard')
            ->select('intGuardID', 'strFirstName', 'strLastName')
            ->where('intAccountID', $accountID)
            ->first();

        $guardLeave = array();

        foreach($arrLeaveID as $value){
            $result = DB::table('tblguardleave')
                ->join('tblleave', 'tblleave.intLeaveID', '=','tblguardleave.intLeaveID')
                ->select('tblguardleave.*', 'tblleave.strLeaveType')
                ->where('intGuardID',$guardInformation->intGuardID)
                ->where('tblguardleave.intLeaveID',$value->intLeaveID)
                ->orderBy('intGuardLeaveID','desc')
                ->first();
            $result->intNotificationPeriod = $value->intNotificationPeriod;
            if (!is_null($result)){
                array_push($guardLeave, $result);    
            }
        }

        return view('/securityguard/SecurityLeaveRequest')
            ->with('guardInformation', $guardInformation)
            ->with('guardLeave', $guardLeave);
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
        $accountID = $request->session()->get('accountID');
        $status = DB::table('tblguard')
            ->select('intStatusIdentifier')
            ->where('intAccountID', $accountID)
            ->first();

        $guardID = DB::table('tblguard')
            ->select('intGuardID')
            ->where('intAccountID', $accountID)
            ->first();

        $countActiveLeaveRequest = DB::table ('tblguardleaverequest')
            ->where('intGuardID', $guardID->intGuardID)
            ->count();// checking if there's still existing leave 

        $status->countActiveLeaveRequest = $countActiveLeaveRequest;
        return response()->json($status);
    }
}
