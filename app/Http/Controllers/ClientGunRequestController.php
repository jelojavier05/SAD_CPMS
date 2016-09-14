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
        if ($countSwapRequest > 0){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }
}
