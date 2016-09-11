<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Input;

class ClientGuardRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/client/ClientGuardRequest1');
    }

    public function getActiveGuard(Request $request){
        $clientID = $request->session()->get('id');
        $now = Carbon::now();

        $contractID = DB::table('tblcontract')
            ->select('intContractID')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
            ->first();
        
        $guardID = DB::table('tblclientguard')
            ->select('intGuardID')
            ->where('intContractID', $contractID->intContractID)
            ->groupBy('intGuardID')
            ->get();

        $clientGuard = array();
        foreach($guardID as $value){
            $result = DB::table('tblcontract')    
                ->join('tblclientguard', 'tblclientguard.intContractID', '=', 'tblcontract.intContractID')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguard.strFirstName','tblguard.strLastName', 'tblguardlicense.strLicenseNumber','tblguard.intGuardID', 'tblclientguard.boolStatus', 'tblguard.strGender')
                ->where('tblclientguard.intGuardID', $value->intGuardID)
                ->where('tblclientguard.intContractID', $contractID->intContractID)
                ->where('tblclientguard.created_at', '<=', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            if ($result->boolStatus == 1 || $result->boolStatus == 2){
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
            $clientAccountID = $request->session()->get('accountID');
            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $adminID = $result->intAccountID;
            $clientID = $request->session()->get('id');

            $inboxID = DB::table('tblinbox')->insertGetId([
                'intAccountIDSender' => $clientAccountID,
                'intAccountIDReceiver' => $adminID,
                'strMessage' => $reason,
                'strSubject' => 'Additional guard request',
                'tinyintType' => 5 // add guard
            ]);

            $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 8);
            $message = 'Please take note of this code "' . $code .'". This will be needed in finalization of your additional guard request. Thank you.';
            DB::table('tblinbox')->insert([
                'intAccountIDSender' => $adminID,
                'intAccountIDReceiver' => $clientAccountID,
                'strSubject' => 'Additional Guard Request',
                'strMessage' => $message,
                'tinyintType' => 0
            ]);
            
            DB::table('tblclientpendingnotification')->insert([
                'intClientID' => $clientID,
                'intNumberOfGuard' => $numberGuard,
                'intInboxID' => $inboxID,
                'strCode' => $code
            ]);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function getCode(Request $request){
        $inboxID = Input::get('inboxID');

        $result = DB::table('tblclientadditionalguard')
            ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientPendingID', '=', 'tblclientadditionalguard.intClientPendingID')
            ->select('tblclientpendingnotification.strCode')
            ->where('tblclientadditionalguard.intInboxID',$inboxID)
            ->first();
        $code = $result->strCode;

        return response()->json($code);
    }

    public function swapGuard(Request $request){
        try{
            DB::beginTransaction();
            $arrGuardID = $request->arrGuardID;
            $reason = $request->reason;
            $clientID = $request->session()->get('id');
            $clientAccountID = $request->session()->get('accountID');

            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $adminAccountID = $result->intAccountID;

            $adminInboxID = DB::table('tblinbox')->insertGetId([
                'intAccountIDSender' => $clientAccountID,
                'intAccountIDReceiver' => $adminAccountID,
                'strSubject' => 'Change Guard Request', 
                'tinyintType' => 10
            ]);

            $swapGuardHeaderID = DB::table('tblswapguardrequestheader')->insertGetId([
                'intClientID' => $clientID,
                'intInboxID' => $adminInboxID,
                'strReason' => $reason
            ]);

            foreach($arrGuardID as $value){
                DB::table('tblswapguardrequestdetail')->insert([
                    'intSwapGuardHeaderID' => $swapGuardHeaderID,
                    'intGuardID' => $value
                ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function hasSwapGuardRequest(Request $request){
        $clientID = $request->session()->get('id');

        $result = DB::table('tblswapguardrequestheader')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
            ->count();

        if ($result > 0){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }
}
