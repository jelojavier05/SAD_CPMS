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

        $request->session()->put('addGunRequestInboxID', $inboxID);
    }

    public function insertGunOrder(Request $request){
        if ($request->session()->has('addGunRequestInboxID')){
            try{
                DB::beginTransaction();
                // Set Variables Start
                    $arrGun = $request->arrGunAdded;
                    $arrRound = $request->arrGunRound;
                    $inboxID = $request->session()->get('addGunRequestInboxID');
                    $clientInformation = DB::table('tbladdgunrequest')
                        ->join('tblclient','tblclient.intClientID', '=','tbladdgunrequest.intClientID')
                        ->select('tbladdgunrequest.intClientID', 'tblclient.intAccountID')
                        ->where('tbladdgunrequest.intInboxID', $inboxID)
                        ->first();
                    $result = DB::table('tblaccount')
                        ->select('intAccountID')
                        ->where('intAccountType', 3)
                        ->first();
                    $adminAccountID = $result->intAccountID;

                    $message = 'Your Additional Gun Request has been Approved. We will deliver the gun as soon as possible.';
                    $subject = 'Additional Gun Update';

                    $now = Carbon::now();
                // Set Variables End

                // Process Start
                    DB::table('tblinbox')->insert([
                        'intAccountIDSender' => $adminAccountID,
                        'intAccountIDReceiver' => $clientInformation->intAccountID,
                        'strMessage' => $message,
                        'strSubject' => $subject,
                        'tinyintType' => 0
                    ]);

                    DB::table('tbladdgunrequest')
                        ->where('intInboxID', $inboxID)
                        ->update([
                            'boolStatus' => 2,
                            'updated_at' => $now
                        ]);

                    $orderHeaderID = DB::table('tblgunorderheader')->insertGetId([
                        'intClientID' => $clientInformation->intClientID,
                        'created_at' => $now
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
                // Process End
                DB::commit();
            }catch(Exception $e){   
                DB::rollback();
            }

                
        }//if else
    }
}
