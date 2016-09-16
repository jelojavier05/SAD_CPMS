<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class ClientGunRequestController extends Controller{
    public function index(){
        return view('/client/ClientGunRequest');
    }

    public function getActiveGun(Request $request){

        if ($request->session()->has('id')){
            $clientID = $request->session()->get('id');
            $clientGun = DB::table('tblcontract')
                ->join('tblclientgun', 'tblclientgun.intContractID', '=', 'tblcontract.intContractID')
                ->join('tblgun','tblgun.intGunID', '=', 'tblclientgun.intGunID')
                ->join('tblgunlicense', 'tblgunlicense.intGunID', '=', 'tblgun.intGunID')
                ->select('tblgun.strSerialNumber', 'tblgun.strGunName', 'tblgunlicense.strLicenseNumber', 'tblclientgun.intRound', 'tblgun.intGunID')
                ->where('tblclientgun.boolStatus', 1)
                ->where('tblcontract.intClientID', $clientID)
                ->where('tblcontract.boolStatus', 1)
                ->get();

            return response()->json($clientGun);
        }else{
            return response()->json(false);
        }// if session is set
    }//function get active gun

    public function insertAddGunRequest(Request $request){
        try{
            DB::beginTransaction();
            // Set Variables Start
                $clientID = $request->session()->get('id');
                $clientAccountID = $request->session()->get('accountID');
                $countGun = $request->intCountGun;
                $strRequest = $request->strRequest;
                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;
            // Set Variables End
                
            // Process Start
                $inboxID = DB::table('tblinbox')->insertGetId([
                    'intAccountIDSender' => $clientAccountID,
                    'intAccountIDReceiver' => $adminAccountID,
                    'strSubject' => 'Additional Gun Request', 
                    'tinyintType' => 14
                ]);

                DB::table('tbladdgunrequest')->insert([
                    'intClientID' => $clientID,
                    'intInboxID' => $inboxID,
                    'intCountGun' => $countGun, 
                    'strRequest' => $strRequest
                ]);
            // Process End

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }//function insert add gun request

    public function getAddGunRequest(Request $request){
        $inboxID = Input::get('inboxID');

        $requestInformation = DB::table('tbladdgunrequest')
            ->join('tblclient', 'tblclient.intClientID', '=' ,'tbladdgunrequest.intClientID')
            ->select('tbladdgunrequest.*', 'tblclient.strClientName')
            ->where('intInboxID', $inboxID)
            ->first();
        
        return response()->json($requestInformation);
    }

    public function declineAddGunRequest(Request $request){
        

        try{
            DB::beginTransaction();
            // Set Variables start
                $inboxID = Input::get('inboxID');
                $adminAccountID = $request->session()->get('accountID');
                $now = Carbon::now();
                $result = DB::table('tbladdgunrequest')
                    ->join('tblclient', 'tblclient.intClientID', ' =', 'tbladdgunrequest.intClientID')
                    ->select('tblclient.intAccountID')
                    ->where('tbladdgunrequest.intInboxID', $inboxID)
                    ->first();
                $clientAccountID = $result->intAccountID;

                $message = 'Your Additional Gun Request has been declined by the admin.';
                $subject = 'Additional Gun Request Update';
            // Set Variables end

            // Process Start
                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $adminAccountID,
                    'intAccountIDReceiver' => $clientAccountID,
                    'strMessage' => $message, 
                    'strSubject' => $subject,
                    'tinyintType' => 0
                ]);

                DB::table('tbladdgunrequest')
                    ->where('intInboxID' ,$inboxID)
                    ->update([
                        'boolStatus' => 0, 
                        'updated_at' => $now
                    ]);
            // Process End

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function insertSwapGunRequest(Request $request){
        try{
            DB::beginTransaction();
            // Set Variables Start
                $arrCheckedGun = $request->arrCheckedGun;
                $strNote = $request->strNote;
                $clientID = $request->session()->get('id');
                $clientAccountID = $request->session()->get('accountID');
                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;
                $subject = 'Swap Gun Request';
            // Set Variables End


            // Process Start
                $inboxID = DB::table('tblinbox')->insertGetId([
                    'intAccountIDSender' => $clientAccountID,
                    'intAccountIDReceiver' => $adminAccountID,
                    'strSubject' => $subject,
                    'tinyintType' => 15
                ]);

                $swapGunHeaderID = DB::table('tblswapgunheader')->insertGetId([
                    'intInboxID' => $inboxID,
                    'intClientID' => $clientID,
                    'strNote' => $strNote,
                    'boolStatus' => 1
                ]);

                foreach($arrCheckedGun as $value){
                    DB::table('tblswapgundetail')->insert([
                        'intSwapGunHeaderID' => $swapGunHeaderID,
                        'intGunID' => $value
                    ]);
                }//foreach
            // Process End

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function hasSwapGunRequest(Request $request){
        $clientID = $request->session()->get('id');

        $countSwapRequest = DB::table('tblswapgunheader')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
            ->count();
        $countRemoveRequest = DB::table('tblremovegunheader')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
            ->count();

        if ($countSwapRequest > 0 || $countRemoveRequest > 0){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function getSwapGunRequestInformation(Request $request){
        $inboxID = Input::get('inboxID');

        $swapRequestInformation = DB::table('tblswapgunheader')
            ->join('tblswapgundetail', 'tblswapgundetail.intSwapGunHeaderID', '=', 'tblswapgunheader.intSwapGunHeaderID')
            ->join('tblclient','tblclient.intClientID', '=', 'tblswapgunheader.intClientID')
            ->select('tblswapgunheader.strNote', 'tblclient.strClientName', 'tblswapgunheader.intSwapGunHeaderID')
            ->where('tblswapgunheader.intInboxID', $inboxID)
            ->first();

        $guns = DB::table('tblswapgundetail')
            ->join('tblgun', 'tblgun.intGunID', '=', 'tblswapgundetail.intGunID')
            ->join('tbltypeofgun','tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.strGunName', 'tbltypeofgun.strTypeOfGun', 'tblgun.strSerialNumber')
            ->where('tblswapgundetail.intSwapGunHeaderID', $swapRequestInformation->intSwapGunHeaderID)
            ->get();

        $swapRequestInformation->guns = $guns;

        return response()->json($swapRequestInformation);
    }

    public function insertRemoveGunRequest(Request $request){
        try{
            DB::beginTransaction();
            // Set Variables Start
                $arrCheckedGun = $request->arrCheckedGun;
                $strNote = $request->strNote;
                $clientID = $request->session()->get('id');
                $clientAccountID = $request->session()->get('accountID');
                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;
                $subject = 'Remove Gun Request';
            // Set Variables End


            // Process Start
                $inboxID = DB::table('tblinbox')->insertGetId([
                    'intAccountIDSender' => $clientAccountID,
                    'intAccountIDReceiver' => $adminAccountID,
                    'strSubject' => $subject,
                    'tinyintType' => 16
                ]);

                $removeGunHeaderID = DB::table('tblremovegunheader')->insertGetId([
                    'intInboxID' => $inboxID,
                    'intClientID' => $clientID,
                    'strNote' => $strNote,
                    'boolStatus' => 1
                ]);

                foreach($arrCheckedGun as $value){
                    DB::table('tblremovegundetail')->insert([
                        'intRemoveGunHeaderID' => $removeGunHeaderID,
                        'intGunID' => $value
                    ]);
                }//foreach
            // Process End

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function getRemoveGunRequestInformation(Request $request){
        $inboxID = Input::get('inboxID');

        $removeGunRequestInformation = DB::table('tblremovegunheader')
            ->select('*')
            ->where('intInboxID', $inboxID)
            ->first();
        
        $guns = DB::table('tblremovegundetail')
            ->join('tblgun', 'tblgun.intGunID', '=', 'tblremovegundetail.intGunID')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.strGunName', 'tblgun.strSerialNumber', 'tbltypeofgun.strTypeOfGun', 'tblgun.intGunID')
            ->where('tblremovegundetail.intRemoveGunHeaderID', $removeGunRequestInformation->intRemoveGunHeaderID)
            ->get();

        $removeGunRequestInformation->guns = $guns;

        return response()->json($removeGunRequestInformation);
    }

    public function acceptRemoveGunRequest(Request $request){

        try{
            DB::beginTransaction();
            // Set Variables start
                $arrRemoveGunID = $request->arrRemoveGunID;
                $inboxID = $request->inboxID;
                $clientInformation = DB::table('tblremovegunheader')
                    ->join('tblclient', 'tblclient.intClientID', '=', 'tblremovegunheader.intClientID')
                    ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblclient.intClientID')
                    ->select('tblclient.intClientID', 'tblclient.intAccountID', 'tblcontract.intContractID')
                    ->where('tblremovegunheader.intInboxID', $inboxID)
                    ->where('tblcontract.boolStatus', 1)
                    ->first();
                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;
                $now = Carbon::now();

                $message = 'Your Remove Gun Request has been accepted. We wil pick up the gun as soon as possible.';
                $subject = 'Remove Gun Request Update';
            // Set Variables end

            // Process start    
                $gunOrderHeaderID = DB::table('tblgunorderheader')->insertGetId([
                    'intClientID' => $clientInformation->intClientID,
                    'tinyintType' => 2, //for removal gun request
                    'created_at' => $now
                ]);

                foreach($arrRemoveGunID as $value){
                    DB::table('tblgunorderdetail')->insert([
                        'intGunOrderHeaderID' => $gunOrderHeaderID,
                        'intGunID' => $value,
                        'intRounds' => 0
                    ]);    
                }

                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $adminAccountID,
                    'intAccountIDReceiver' => $clientInformation->intAccountID,
                    'strMessage' => $message,
                    'strSubject' => $subject,
                    'tinyintType' => 0
                ]);

                DB::table('tblremovegunheader')
                    ->where('intInboxID', $inboxID)
                    ->update([
                        'boolStatus' => 2,
                        'updated_at' => $now
                    ]);
            // Process End

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }//try catch
    }

    public function declineRemoveGunRequest(Request $request){

        try{
            DB::beginTransaction();
            // Set Variables start
                $inboxID = $request->inboxID;
                $clientInformation = DB::table('tblremovegunheader')
                    ->join('tblclient', 'tblclient.intClientID', '=', 'tblremovegunheader.intClientID')
                    ->select('tblclient.intClientID', 'tblclient.intAccountID')
                    ->where('tblremovegunheader.intInboxID', $inboxID)
                    ->first();
                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;
                $now = Carbon::now();

                $message = 'Your Remove Gun Request has been rejected.';
                $subject = 'Remove Gun Request Update';
            // Set Variables end

            // Process Start
                DB::table('tblremovegunheader')
                    ->where('intInboxID', $inboxID)
                    ->update([
                        'boolStatus' => 0,
                        'updated_at' => $now
                    ]);

                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $adminAccountID,
                    'intAccountIDReceiver' => $clientInformation->intAccountID,
                    'strMessage' => $message,
                    'strSubject' => $subject,
                    'tinyintType' => 0
                ]);
            // Process End

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
