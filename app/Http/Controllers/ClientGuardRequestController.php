<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class ClientGuardRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/client/ClientGuardRequest');
    }

    public function getActiveGuard(Request $request){
        $clientID = $request->session()->get('id');
        $now = Carbon::now();
        
        $guardID = DB::table('tblclient')
            ->join('tblcontract', 'tblcontract.intClientID', '=','tblclient.intClientID')
            ->join('tblclientguard' ,'tblclientguard.intContractID', '=','tblcontract.intContractID')
            ->join('tblguard', 'tblguard.intGuardID', '=','tblclientguard.intGuardID')
            ->select('tblguard.intGuardID')
            ->where('tblclient.intClientID', $clientID)
            ->groupBy('tblclientguard.intGuardID')
            ->get();

        $clientGuard = array();
        foreach($guardID as $value){
            $result = DB::table('tblclientguard')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguard.strFirstName','tblguard.strLastName', 'tblguardlicense.strLicenseNumber','tblguard.intGuardID', 'tblclientguard.boolStatus', 'tblguard.strGender')
                ->where('tblclientguard.intGuardID' ,$value->intGuardID)
                ->where('tblclientguard.created_at', '<', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            if ($result->boolStatus == 1 || $result->boolStatus == 3){
                $resultAttendance = DB::table('tblattendance')
                    ->select('datetimeIn', 'datetimeOut')
                    ->where('intGuardID', $value->intGuardID)
                    ->where('intClientID', $clientID)
                    ->orderBy('datetimeIn', 'desc')
                    ->first();       
                array_push($clientGuard, $result);
            }
        }
        return response()->json($clientGuard);
    }//get active guard in the cgrm

    public function hasAddRequest(Request $request){
        $clientID = $request->session()->get('id');

        $result = DB::table('tblclientpendingnotification')
            ->where('intClientID', $clientID)
            ->where('intStatusIdentifier', 1)
            ->count();

        if ($result > 0){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function addGuard(Request $request){
            

        try{
            DB::beginTransaction();
            $numberGuard = $request->numberGuard;
            $reason = $request->reason;
            $senderID = $request->session()->get('accountID');
            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $receiverID = $result->intAccountID;
            $clientID = $request->session()->get('id');

            $inboxID = DB::table('tblinbox')->insertGetId([
                'intAccountIDSender' => $senderID,
                'intAccountIDReceiver' => $receiverID,
                'strMessage' => $reason,
                'strSubject' => 'Additional guard request',
                'tinyintType' => 5 // add guard
            ]);
            
            DB::table('tblclientpendingnotification')->insert([
                'intClientID' => $clientID,
                'intNumberOfGuard' => $numberGuard,
                'intInboxID' => $inboxID   
            ]);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
