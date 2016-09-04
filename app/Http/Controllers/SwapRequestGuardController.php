<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class SwapRequestGuardController extends Controller{

    public function checkStatusSwapRequest(Request $request){
        $inboxID = Input::get('inboxID');

        $result = DB::table('tblswapresponse')
            ->join('tblswaprequest', 'tblswaprequest.intSwapRequestID', '=', 'tblswapresponse.intSwapRequestID')
            ->select('tblswaprequest.boolStatus')
            ->where('tblswapresponse.intInboxID', $inboxID)
            ->first();
        $status = $result->boolStatus;

        return response()->json($status);
    }

    public function acceptSwapRequest(Request $request){
        $inboxID = $request->inboxID;
        try{
            DB::beginTransaction();
            $now = Carbon::now();
            $now->hour = 0;
            $now->minute = 0;
            $now->second = 0;

            $dayEffectivity = $now->addDays(3);
            
            $clientID = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();

            $result = DB::table('tblswapresponse')
                ->join('tblswaprequest', 'tblswaprequest.intSwapRequestID', '=', 'tblswapresponse.intSwapRequestID')
                ->select('tblswapresponse.intSwapResponseID', 'tblswaprequest.intSwapRequestID', 'tblswaprequest.intClientGuardSenderID', 'tblswaprequest.intClientGuardReceiverID')
                ->where('tblswapresponse.intInboxID', $inboxID)
                ->first();

            $guardSenderInformation = DB::table('tblclientguard')
                ->join('tblguard','tblguard.intGuardID', '=','tblclientguard.intGuardID')
                ->join('tblcontract', 'tblcontract.intContractID','=','tblclientguard.intContractID')
                ->join('tblclient', 'tblclient.intClientID','=','tblcontract.intClientID')
                ->select('tblclientguard.intGuardID', 'tblcontract.intContractID', 'tblclient.strClientName', 'tblguard.intAccountID')
                ->where('intClientGuardID', $result->intClientGuardSenderID)
                ->first();

            $guardReceiverInformation = DB::table('tblclientguard')
                ->join('tblguard','tblguard.intGuardID', '=','tblclientguard.intGuardID')
                ->join('tblcontract', 'tblcontract.intContractID','=','tblclientguard.intContractID')
                ->join('tblclient', 'tblclient.intClientID','=','tblcontract.intClientID')
                ->select('tblclientguard.intGuardID', 'tblcontract.intContractID', 'tblclient.strClientName', 'tblguard.intAccountID')
                ->where('intClientGuardID', $result->intClientGuardReceiverID)
                ->first();            

            $dayEffectivityString = $dayEffectivity->toFormattedDateString();
            $messageSender = 'The swap request has been accepted. You are now assigned to ' . $guardReceiverInformation->strClientName . '. Its effectivity date is on '. $dayEffectivityString . '.';

            $messageReceiver = 'The swap request has been accepted. You are now assigned to ' . $guardSenderInformation->strClientName . '. Its effectivity date is on '. $dayEffectivityString . '.';
            $subject = 'Swap Request Update';


            DB::table('tblswaprequest')
                ->where('intSwapRequestID', $result->intSwapRequestID)
                ->update([
                    'boolStatus' => 2
                ]);// the request was accepted by the admin

            //sending inbox Start
                DB::table('tblinbox')->insert([
                    ['strMessage' => $messageSender, 'intAccountIDSender' => $clientID->intAccountID, 'intAccountIDReceiver' => $guardSenderInformation->intAccountID, 'strSubject' => $subject, 'tinyintType' => 0],
                    ['strMessage' => $messageReceiver, 'intAccountIDSender' => $clientID->intAccountID, 'intAccountIDReceiver' => $guardReceiverInformation->intAccountID, 'strSubject' => $subject, 'tinyintType' => 0]
                ]);
            //sending inbox End

            //changing the client in specific date start
                DB::table('tblclientguard')->insert([
                    ['intGuardID' => $guardSenderInformation->intGuardID, 'intContractID' => $guardReceiverInformation->intContractID, 'boolStatus' => 1, 'created_at' => $dayEffectivity],
                    ['intGuardID' => $guardReceiverInformation->intGuardID, 'intContractID' => $guardSenderInformation->intContractID, 'boolStatus' => 1, 'created_at' => $dayEffectivity],//new client
                    ['intGuardID' => $guardSenderInformation->intGuardID, 'intContractID' => $guardSenderInformation->intContractID, 'boolStatus' => 0, 'created_at' => $dayEffectivity],
                    ['intGuardID' => $guardReceiverInformation->intGuardID, 'intContractID' => $guardReceiverInformation->intContractID, 'boolStatus' => 0, 'created_at' => $dayEffectivity]//previous client
                ]);
            //changing the client in specific date end

            
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }     
    }
}
