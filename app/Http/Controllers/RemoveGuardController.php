<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class RemoveGuardController extends Controller
{
    public function getRequestInformation(Request $request){
        $inboxID = Input::get('inboxID');
        $now = Carbon::now();
        $removeGuardData = DB::table('tblremoveguardheader')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblremoveguardheader.intClientID')
            ->select('tblremoveguardheader.*', 'tblclient.strClientName')
            ->where('tblremoveguardheader.intInboxID', $inboxID)
            ->first();

        $contractID = DB::table('tblcontract')
            ->select('intContractID')
            ->where('intClientID', $removeGuardData->intClientID)
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
                ->select('tblclientguard.boolStatus')
                ->where('tblclientguard.intGuardID', $value->intGuardID)
                ->where('tblclientguard.intContractID', $contractID->intContractID)
                ->where('tblclientguard.created_at', '<=', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            if ($result->boolStatus == 1 || $result->boolStatus == 3){
                array_push($clientGuard, $result);
            }
        }

        $guards = DB::table('tblremoveguarddetail')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblremoveguarddetail.intGuardID')
            ->join('tblguardaddress', 'tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblguardaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblguardaddress.intCityID')
            ->select('tblguard.intGuardID','tblguard.strFirstName','tblguard.strLastName', 'tblguardaddress.strAddress','tblprovince.strProvinceName','tblcity.strCityName', 'tblguard.strGender')
            ->where('intRemoveGuardHeaderID', $removeGuardData->intRemoveGuardHeaderID)
            ->get();

        $clientGun = DB::table('tblclientgun')
            ->join('tblgun', 'tblgun.intGunID','=', 'tblclientgun.intGunID')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=' ,'tblgun.intTypeOfGunID')
            ->select('tblclientgun.intRound', 'tblgun.strGunName', 'tblgun.strSerialNumber', 'tbltypeofgun.strTypeOfGun', 'tblgun.intGunID')
            ->where('tblclientgun.intContractID', $contractID->intContractID)
            ->where('tblclientgun.boolStatus', 1)
            ->get();


        $removeGuardData->clientGun = $clientGun;
        $removeGuardData->remainingGuard = count($clientGuard) - count($guards);
        $removeGuardData->removeGuard = $guards;

        return response()->json($removeGuardData);
    }

    public function accept (Request $request){
        try{
            DB::beginTransaction();
            //setting variables Start
                $inboxID = $request->inboxID;
                $now = Carbon::now();
                $effectivityDate = Carbon::now();
                $effectivityDate = $effectivityDate->addDays(2);
                $effectivityDate->hour = 0;
                $effectivityDate->minute = 0;
                $effectivityDate->second = 0;

                $removeGuardRequestData = DB::table('tblremoveguardheader')
                    ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblremoveguardheader.intClientID')
                    ->join('tblclient', 'tblclient.intClientID', '=' ,'tblcontract.intClientID')
                    ->select('tblcontract.intContractID', 'tblclient.strClientName', 'tblclient.intAccountID', 'tblclient.intClientID')
                    ->where('tblremoveguardheader.intInboxID', $inboxID)
                    ->where('tblcontract.boolStatus', 1)
                    ->first();

                $arrRemoveGunID = $request->arrGunChecked;

                $guards = DB::table('tblremoveguardheader')
                    ->join('tblremoveguarddetail', 'tblremoveguarddetail.intRemoveGuardHeaderID', '=', 'tblremoveguardheader.intRemoveGuardHeaderID')
                    ->join('tblguard', 'tblguard.intGuardID', '=', 'tblremoveguarddetail.intGuardID')
                    ->select('tblguard.intGuardID', 'tblguard.intAccountID')
                    ->where('tblremoveguardheader.intInboxID', $inboxID)
                    ->get();

                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;

                $guardSubject = 'Guard Removal';
                $guardMessage = 'You are requested by ' . $removeGuardRequestData->strClientName . ' to be removed in their list of guard. Please report on the barracks immediately. Effectivity Date: ' . $effectivityDate->toFormattedDateString() . '.';

                $clientSubject = 'Remove Guard Request Update';
            //setting variables End


            //Process in Database Start
                DB::table('tblremoveguardheader')
                    ->where('intInboxID', $inboxID)
                    ->update([
                        'boolStatus' => 2, 
                        'updated_at' => $now
                    ]);

                foreach($guards as $value){

                    DB::table('tblclientguard')->insert([
                        'intGuardID' => $value->intGuardID,
                        'intContractID' => $removeGuardRequestData->intContractID,
                        'boolStatus' => 0,
                        'created_at' => $effectivityDate
                    ]);

                    DB::table('tblguardstatus')->insert([
                        'intGuardID' => $value->intGuardID,
                        'intStatusIdentifier' => 0,
                        'dateEffectivity' => $effectivityDate
                    ]);

                    DB::table('tblinbox')->insert([
                        'intAccountIDSender' => $adminAccountID,
                        'intAccountIDReceiver' => $value->intAccountID, 
                        'strMessage' => $guardMessage,
                        'strSubject' => $guardSubject,
                        'tinyintType' => 0
                    ]);//send message from admin to guards
                }//foreach

                if(count($arrRemoveGunID) > 0){
                    $gunOrderHeaderID = DB::table('tblgunorderheader')->insertGetId([
                        'intClientID' => $removeGuardRequestData->intClientID,
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

                    $clientMessage = 'We accepted your remove guard request. Effectivity Date: ' . $effectivityDate->toFormattedDateString() . '. We will also pullout ' . count($arrRemoveGunID) . ' gun(s) from you.';
                }else{
                    $clientMessage = 'We accepted your remove guard request. Effectivity Date: ' . $effectivityDate->toFormattedDateString() . '.';
                }

                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $adminAccountID,
                    'intAccountIDReceiver' => $removeGuardRequestData->intAccountID, 
                    'strMessage' => $clientMessage,
                    'strSubject' => $clientSubject,
                    'tinyintType' => 0
                ]);//send message from admin to client

            //Process in Database End
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function decline(Request $request){
        try{
            DB::beginTransaction();
            //setting variables Start
                $inboxID = $request->inboxID;
                $now = Carbon::now();
                $clientMessage = 'Your Remove Guard Request has been declined.';
                $clientSubject = 'Remove Guard Request Update';

                $removeGuardRequestData = DB::table('tblremoveguardheader')
                    ->join('tblclient', 'tblclient.intClientID', '=' ,'tblremoveguardheader.intClientID')
                    ->select('tblclient.intAccountID')
                    ->where('tblremoveguardheader.intInboxID', $inboxID)
                    ->first();
                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;
            //setting variables End


            //Process in Database Start
                DB::table('tblremoveguardheader')
                    ->where('intInboxID', $inboxID)
                    ->update([
                        'boolStatus' => 0, 
                        'updated_at' => $now
                    ]);

                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $adminAccountID,
                    'intAccountIDReceiver' => $removeGuardRequestData->intAccountID, 
                    'strMessage' => $clientMessage,
                    'strSubject' => $clientSubject,
                    'tinyintType' => 0
                ]);//send message from admin to client
            //Process in Database End
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
