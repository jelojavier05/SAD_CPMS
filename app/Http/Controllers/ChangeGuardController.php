<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class ChangeGuardController extends Controller{

    public function getChangeGuardRequest(){
        $inboxID = Input::get('inboxID');

        $swapGuardData = DB::table('tblswapguardrequestheader')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblswapguardrequestheader.intClientID')
            ->select('tblswapguardrequestheader.*', 'tblclient.strClientName')
            ->where('tblswapguardrequestheader.intInboxID', $inboxID)
            ->first();

        $guards = DB::table('tblswapguardrequestdetail')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblswapguardrequestdetail.intGuardID')
            ->join('tblguardaddress', 'tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblguardaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblguardaddress.intCityID')
            ->select('tblguard.intGuardID','tblguard.strFirstName','tblguard.strLastName', 'tblguardaddress.strAddress','tblprovince.strProvinceName','tblcity.strCityName')
            ->where('intSwapGuardHeaderID', $swapGuardData->intSwapGuardHeaderID)
            ->get();

        $swapGuardData->guards = $guards;

        return response()->json($swapGuardData);
    }

    public function getGuardWaiting(){
        $inboxID = Input::get('inboxID');
        $now = Carbon::now();

        $arrGuardID = DB::table('tblguard')
            ->join('tblguardaddress', 'tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblguardaddress.intProvinceID')
            ->join('tblcity','tblcity.intCityID', '=', 'tblguardaddress.intCityID')
            ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblprovince.strProvinceName' ,'tblcity.strCityName')
            ->where('boolStatus', 1)
            ->get();

        $result = DB::table('tblswapguardrequestheader')
            ->select('intSwapGuardHeaderID')
            ->where('intInboxID', $inboxID)
            ->first();
        $swapGuardHeaderID = $result->intSwapGuardHeaderID;

        $arrayGuardWaiting = array();
        foreach($arrGuardID as $value){
            $guardID = $value->intGuardID;

            $result = DB::table('tblguardstatus')
                ->select('intStatusIdentifier')
                ->where('dateEffectivity', '<=', $now)
                ->where('intGuardID', $guardID)
                ->orderBy('dateEffectivity', 'desc')
                ->first();

            $hasGuardHeader = DB::table('tblswapguardresponse')
                ->where('intSwapGuardHeaderID', $swapGuardHeaderID)
                ->where('intGuardID', $guardID)
                ->count();

            if ($result->intStatusIdentifier == 0 && $hasGuardHeader == 0){
                array_push($arrayGuardWaiting, $value);
            }
        }//foreach
        return response()->json($arrayGuardWaiting);
    }//function

    public function sendGuardNotification(Request $request){
        try{
            DB::beginTransaction();
            $arrGuardID = $request->arrGuardID;
            $inboxID = $request->inboxID;
            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $adminAccountID = $result->intAccountID;

            $result = DB::table('tblswapguardrequestheader')
                ->select('intSwapGuardHeaderID')
                ->where('intInboxID', $inboxID)
                ->first();
            $swapGuardHeaderID = $result->intSwapGuardHeaderID;

            foreach($arrGuardID as $value){
                $result = DB::table('tblguard')
                    ->select('intAccountID')
                    ->where('intGuardID', $value)
                    ->first();
                $guardAccountID = $result->intAccountID;

                $inboxID = DB::table('tblinbox')->insertGetId([
                    'intAccountIDSender' => $adminAccountID,
                    'intAccountIDReceiver' => $guardAccountID,
                    'strSubject' => 'Change Guard Request', 
                    'tinyintType' => 11
                ]);

                DB::table('tblswapguardresponse')->insert([
                    'intSwapGuardHeaderID' => $swapGuardHeaderID, 
                    'intGuardID' => $value, 
                    'intInboxID' => $inboxID
                ]);
            }//foreach

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function getClientRequested(Request $request){
        $inboxID = Input::get('inboxID');

        $client = DB::table('tblswapguardresponse')
            ->join('tblswapguardrequestheader', 'tblswapguardrequestheader.intSwapGuardHeaderID', '=', 'tblswapguardresponse.intSwapGuardHeaderID')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblswapguardrequestheader.intClientID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfBusinessID')
            ->select('tblclient.*', 'tblnatureofbusiness.strNatureOfBusiness', 'tblprovince.strProvinceName','tblcity.strCityName','tblclientaddress.strAddress', 'tblswapguardresponse.boolStatus')
            ->where('tblswapguardresponse.intInboxID', $inboxID)
            ->first();

        $shift = DB::table('tblclientshift')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblclientshift.intClientID')
            ->select('tblclientshift.*')
            ->where('tblclient.intClientID', $client->intClientID)
            ->get();
        
        foreach($shift as $value){
            $value->timeFrom = date('h:i A', strtotime($value->timeFrom)); 
            $value->timeTo = date('h:i A', strtotime($value->timeTo)); 
        }

        $client->shift = $shift;

        return response()->json($client);
    }

    public function accept(Request $request){
            
        try{
            DB::beginTransaction();
            //Setting variables needed Start
                $inboxID = $request->inboxID;
                $guardID = $request->session()->get('id');
                $now = Carbon::now();
                $effectivityDate = $now->addDays(2);
                $effectivityDate->hour = 0;
                $effectivityDate->minute = 0;
                $effectivityDate->second = 0;

                $result = DB::table('tblswapguardresponse')
                    ->join('tblswapguardrequestheader', 'tblswapguardrequestheader.intSwapGuardHeaderID', '=', 'tblswapguardresponse.intSwapGuardHeaderID')
                    ->join('tblclient', 'tblclient.intClientID', '=', 'tblswapguardrequestheader.intClientID')
                    ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblclient.intClientID')
                    ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
                    ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
                    ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
                    ->select('tblswapguardresponse.intSwapGuardHeaderID', 'tblclient.strClientName', 'tblclient.intClientID', 'tblcontract.intContractID', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblclient.strContactNumber', 'tblclient.intAccountID')
                    ->where('tblswapguardresponse.intInboxID', $inboxID)
                    ->where('tblcontract.boolStatus', 1)
                    ->first();
                $swapGuardHeaderID = $result->intSwapGuardHeaderID;
                $clientName = $result->strClientName;
                $clientID = $result->intClientID;
                $contractID = $result->intContractID;
                $clientAddress = $result->strAddress . ' ' . $result->strCityName . ', '. $result->strProvinceName;
                $clientContactNumber = $result->strContactNumber;
                $clientAccountID = $result->intAccountID;

                $result = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();
                $adminAccountID = $result->intAccountID;
            //Setting variables needed End

            DB::table('tblswapguardresponse')
                ->where('intInboxID', $inboxID)
                ->where('intGuardID', $guardID)
                ->update([
                    'boolStatus' => 2,
                    'updated_at' => $now
                ]);

            $countGuardReplaced = DB::table('tblswapguardrequestdetail')
                ->where('intSwapGuardHeaderID', $swapGuardHeaderID)
                ->count();

            $countGuardAccepted = DB::table('tblswapguardresponse')
                ->where('intSwapGuardHeaderID', $swapGuardHeaderID)
                ->where('boolStatus', 2)
                ->count();

            if ($countGuardReplaced == $countGuardAccepted){
                DB::table('tblswapguardrequestheader')
                    ->where('intSwapGuardHeaderID', $swapGuardHeaderID)
                    ->update([
                        'boolStatus' => 2,
                        'updated_at' => $now
                    ]);//mark the request as accepted

                //Guard Waiting Start
                    $guardWaiting = DB::table('tblswapguardresponse')
                        ->select('intSwapGuardReponseID')
                        ->where('intSwapGuardHeaderID', $swapGuardHeaderID)
                        ->where('boolStatus', '<>', 2)
                        ->get();
                    if (!is_null($guardWaiting)){
                        foreach($guardWaiting as $value){
                            DB::table('tblswapguardresponse')
                                ->where('intSwapGuardReponseID', $value->intSwapGuardReponseID)
                                ->update([
                                    'boolStatus' => 3, 
                                    'updated_at' => $now
                                ]);
                        }
                    }   
                //Guard Waiting End

                //Guard To be replaced Start
                    $guardToBeReplaced = DB::table('tblswapguardrequestdetail')
                        ->select('intGuardID')
                        ->where('intSwapGuardHeaderID', $swapGuardHeaderID)
                        ->get();

                    $message = $clientName . ' requested you to be replaced for some reasons. Please report to the barracks immediately. Effectivity date: ' . $effectivityDate->toFormattedDateString() . '.';
                    $subject = 'Change Guard Request';

                    foreach($guardToBeReplaced as $value){  
                        $guardID = $value->intGuardID;
                        $result = DB::table('tblguard')
                            ->select('intAccountID')
                            ->where('intGuardID', $guardID)
                            ->first();
                        $guardAccountID = $result->intAccountID;

                        DB::table('tblinbox')->insert([
                            'intAccountIDSender' => $adminAccountID,
                            'intAccountIDReceiver' =>  $guardAccountID,
                            'strMessage' => $message,
                            'strSubject' => $subject,
                            'tinyintType' => 0
                        ]);

                        DB::table('tblclientguard')->insert([
                            'intGuardID' => $guardID,
                            'intContractID' => $contractID,
                            'boolStatus' => 0,
                            'created_at' => $effectivityDate
                        ]);

                        DB::table('tblguardstatus')->insert([
                            'intGuardID' => $guardID,
                            'intStatusIdentifier' => 0,
                            'dateEffectivity' => $effectivityDate
                        ]);
                    }//foreach
                //Guard To be replaced End

                //Guard Accepted Start
                    $guardAccepted = DB::table('tblswapguardresponse')
                        ->select('intGuardID')
                        ->where('intSwapGuardHeaderID', $swapGuardHeaderID)
                        ->where('boolStatus', 2)
                        ->get();

                    $message = 'You are now assigned to ' . $clientName . ' at ' . $clientAddress . '. For more info, contact them at ' . $clientContactNumber . '. Effectivity date: ' . $effectivityDate->toFormattedDateString() . '.';
                    $subject = 'Change Guard Request Update';

                    foreach($guardAccepted as $value){

                        $guardID = $value->intGuardID;
                        $result = DB::table('tblguard')
                            ->select('intAccountID')
                            ->where('intGuardID', $guardID)
                            ->first();
                        $guardAccountID = $result->intAccountID;

                        DB::table('tblinbox')->insert([
                            'intAccountIDSender' => $adminAccountID,
                            'intAccountIDReceiver' =>  $guardAccountID,
                            'strMessage' => $message,
                            'strSubject' => $subject,
                            'tinyintType' => 0
                        ]);

                        DB::table('tblclientguard')->insert([
                            'intGuardID' => $guardID,
                            'intContractID' => $contractID,
                            'boolStatus' => 1,
                            'created_at' => $effectivityDate
                        ]);

                        DB::table('tblguardstatus')->insert([
                            'intGuardID' => $guardID,
                            'intStatusIdentifier' => 2,
                            'dateEffectivity' => $effectivityDate
                        ]);
                    }
                //Guard Accepted End

                $message = 'Guard Replacement has been approved. Effectivity date: ' . $effectivityDate->toFormattedDateString() . '.';
                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $adminAccountID,
                    'intAccountIDReceiver' =>  $clientAccountID,
                    'strMessage' => $message,
                    'strSubject' => $subject,
                    'tinyintType' => 0
                ]);//send inbox from admin to client

                $message = 'The guards needed for the change guard request of ' . $clientName . ' are now compelete. Effectivity date: ' . $effectivityDate->toFormattedDateString();
                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $clientAccountID,
                    'intAccountIDReceiver' =>  $adminAccountID,
                    'strMessage' => $message,
                    'strSubject' => $subject,
                    'tinyintType' => 0
                ]);//send inbox from admin to client
            }// if count guard accepted is equal to count guard to be replaced

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function decline(Request $request){
        $inboxID = $request->inboxID;
        $guardID = $request->session()->get('id');
        $now = Carbon::now();
        try{
            DB::beginTransaction();

            DB::table('tblswapguardresponse')
                ->where('intInboxID', $inboxID)
                ->where('intGuardID', $guardID)
                ->update([
                    'boolStatus' => 0,
                    'updated_at' => $now
                ]);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
