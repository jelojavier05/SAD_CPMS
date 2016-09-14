<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class ClientAddGunProceedController extends Controller
{
    public function index(){
        return view('/ClientAddGunProceed');
    }

    public function setInboxSession(Request $request){
        $inboxID = Input::get('inboxID');
        $identifier = Input::get('requestIdentifier');// 0 - additional gun, 1 - swap gun 

        $request->session()->put('requestIdentifier', $identifier);
        $request->session()->put('addGunRequestInboxID', $inboxID);
    }

    public function insertGunOrder(Request $request){
        if ($request->session()->has('addGunRequestInboxID')){
            try{
                DB::beginTransaction();
                // Set Variables Start
                    $requestIdentifier = $request->session()->get('requestIdentifier');
                    $arrGun = $request->arrGunAdded;
                    $arrRound = $request->arrGunRound;
                    $inboxID = $request->session()->get('addGunRequestInboxID');
                    
                    if ($requestIdentifier == 0){ //additional gun
                        $result = DB::table('tbladdgunrequest')
                            ->join('tblclient','tblclient.intClientID', '=','tbladdgunrequest.intClientID')
                            ->select('tbladdgunrequest.intClientID', 'tblclient.intAccountID')
                            ->where('tbladdgunrequest.intInboxID', $inboxID)
                            ->first();
                        $gunOrderType = 0;
                    }else{//swap gun
                        $result= DB::table('tblswapgunheader')
                            ->join('tblclient', 'tblclient.intClientID', '=', 'tblswapgunheader.intClientID')
                            ->select('tblswapgunheader.intClientID', 'tblclient.intAccountID')
                            ->where('tblswapgunheader.intInboxID', $inboxID)
                            ->first();
                        $gunOrderType = 1;
                    }
                        
                    $clientInformation = $result;

                    $result = DB::table('tblaccount')
                        ->select('intAccountID')
                        ->where('intAccountType', 3)
                        ->first();
                    $adminAccountID = $result->intAccountID;

                    $now = Carbon::now();
                // Set Variables End

                // Process Start

                    $orderHeaderID = DB::table('tblgunorderheader')->insertGetId([
                        'intClientID' => $clientInformation->intClientID,
                        'created_at' => $now,
                        'tinyintType' => $gunOrderType
                    ]);

                    if ($requestIdentifier == 1){//swap gun
                        $swapGunHeaderID = DB::table('tblswapgunheader')
                            ->select('intSwapGunHeaderID')
                            ->where('intInboxID', $inboxID)
                            ->first();

                        DB::table('tblswapordergun')->insert([
                            'intSwapGunHeaderID' => $swapGunHeaderID->intSwapGunHeaderID,
                            'intGunOrderHeaderID' => $orderHeaderID
                        ]);

                        $message = 'Your Swap Gun Request has been Approved. We will deliver the gun as soon as possible.';
                        $subject = 'Swap Gun Update';
                    }else{//additional gun

                        $message = 'Your Additional Gun Request has been Approved. We will deliver the gun as soon as possible.';
                        $subject = 'Additional Gun Update';

                        DB::table('tbladdgunrequest')
                            ->where('intInboxID', $inboxID)
                            ->update([
                                'boolStatus' => 2,
                                'updated_at' => $now
                            ]);
                    }//end if

                    DB::table('tblinbox')->insert([
                        'intAccountIDSender' => $adminAccountID,
                        'intAccountIDReceiver' => $clientInformation->intAccountID,
                        'strMessage' => $message,
                        'strSubject' => $subject,
                        'tinyintType' => 0
                    ]);

                    for($intLoop = 0; $intLoop < count($arrGun); $intLoop ++){
                        DB::table('tblgunorderdetail')->insert([
                            'intGunOrderHeaderID' => $orderHeaderID,
                            'intGunID' => $arrGun[$intLoop],
                            'intRounds' => $arrRound[$intLoop]
                        ]);

                        DB::table('tblgun')
                            ->where('intGunID', $arrGun[$intLoop])
                            ->update([
                                'boolFlag' => 3
                            ]);
                    }

                    DB::table('tblswapgunheader')
                        ->where('intInboxID', $inboxID)
                        ->update([
                            'boolStatus' => 2,
                            'updated_at' => $now 
                        ]);

                // Process End
                DB::commit();
            }catch(Exception $e){   
                DB::rollback();
            }

                
        }//if else
    }

    public function getRequestIdentifier(Request $request){
        if ($request->session()->has('requestIdentifier')){
            return response()->json($request->session()->get('requestIdentifier'));
        }
    }
}
