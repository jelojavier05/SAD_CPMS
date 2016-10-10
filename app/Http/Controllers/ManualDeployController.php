<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
class ManualDeployController extends Controller
{
    public function index()
    {
        return view('/manualDeploy');
    }

    public function manualDeployPermanent(Request $request){
        try{
            DB::beginTransaction();
            $now = Carbon::now();
            $clientID = $request->clientID;
            $replaceGuardID = $request->replaceGuardID;
            $guardWaitingID = $request->guardWaitingID;
            $clientInformation = DB::table('tblclient')
                ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
                ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
                ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
                ->select('tblclient.*', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName')
                ->where('tblclient.intClientID', $clientID)
                ->first();

            $replaceGuardInformation = DB::table('tblguard')
                ->select('intAccountID', 'strFirstName', 'strLastName')
                ->where('intGuardID', $replaceGuardID)
                ->first();

            $guardWaitingInformation = DB::table('tblguard')
                ->select('intAccountID', 'strFirstName', 'strLastName')
                ->where('intGuardID', $guardWaitingID)
                ->first();

            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $adminAccountID = $result->intAccountID;

            $result = DB::table('tblcontract')
                ->select('intContractID')
                ->where('intClientID', $clientID)
                ->where('dateStart', '<=', $now)
                ->orderBy('dateStart', 'desc')
                ->first();
            $contractID = $result->intContractID;

            $messageWaiting = 'You are now assigned to ' . $clientInformation->strClientName . ' at ' . $clientInformation->strAddress . ' ' . $clientInformation->strCityName . ', ' . $clientInformation->strProvinceName . '. Effectivity Date: ' . $now->toFormattedDateString() . '.';
            $messageReplace = 'You have been replaced on your client. Please report to the office immediately.';
            $messageClient = $replaceGuardInformation->strFirstName . ' ' . $replaceGuardInformation->strLastName . ' was replaced by ' . $guardWaitingInformation->strFirstName . ' ' . $guardWaitingInformation->strLastName . '. Effectivity Date: ' . $now->toFormattedDateString() . '.';
            $subject = 'Manual Deployment';

            DB::table('tblguardstatus')->insert([
                ['intGuardID' => $replaceGuardID, 'intStatusIdentifier' => 0, 'dateEffectivity' => $now],//pinalitan
                ['intGuardID' => $guardWaitingID, 'intStatusIdentifier' => 2, 'dateEffectivity' => $now]//pumalit
            ]);

            DB::table('tblclientguard')->insert([
                ['intGuardID' => $replaceGuardID, 'intContractID' => $contractID, 'boolStatus' => 0, 'created_at' => $now],
                ['intGuardID' => $guardWaitingID, 'intContractID' => $contractID, 'boolStatus' => 1, 'created_at' => $now]
            ]);

            DB::table('tblinbox')->insert([
                ['intAccountIDSender' => $adminAccountID, 'intAccountIDReceiver' => $replaceGuardInformation->intAccountID, 'strMessage' => $messageReplace, 'strSubject' => $subject, 'tinyintType' => 0],
                ['intAccountIDSender' => $adminAccountID, 'intAccountIDReceiver' => $guardWaitingInformation->intAccountID, 'strMessage' => $messageWaiting, 'strSubject' => $subject, 'tinyintType' => 0],
                ['intAccountIDSender' => $adminAccountID, 'intAccountIDReceiver' => $clientInformation->intAccountID, 'strMessage' => $messageClient, 'strSubject' => $subject, 'tinyintType' => 0]
            ]);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }//try catch
    }

    public function manualDeployReliever(Request $request){
        try{
            DB::beginTransaction();
            $now = Carbon::now();
            $dateTo = new Carbon($request->dateTo);
            $dateReturn = new Carbon($request->dateTo);
            $dateReturn = $dateReturn->addDays(1);
            $clientID = $request->clientID;
            $replaceGuardID = $request->replaceGuardID;
            $guardWaitingID = $request->guardWaitingID;
            $clientInformation = DB::table('tblclient')
                ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
                ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
                ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
                ->select('tblclient.*', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName')
                ->where('tblclient.intClientID', $clientID)
                ->first();

            $replaceGuardInformation = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $replaceGuardID)
                ->first();

            $guardWaitingInformation = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $guardWaitingID)
                ->first();

            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $adminAccountID = $result->intAccountID;

            $result = DB::table('tblcontract')
                ->select('intContractID')
                ->where('intClientID', $clientID)
                ->where('dateStart', '<=', $now)
                ->orderBy('dateStart', 'desc')
                ->first();
            $contractID = $result->intContractID;

            $messageWaiting = 'You are now a reliever in ' . $clientInformation->strClientName . ' at ' . $clientInformation->strAddress . ' ' . $clientInformation->strCityName . ', ' . $clientInformation->strProvinceName . '. Effectivity date from ' . $now->toFormattedDateString() . ' to ' . $dateTo->toFormattedDateString() . '.';
            $messageReplace = 'You are on leave from ' . $now->toFormattedDateString() . ' to ' . $dateTo->toFormattedDateString() . '.';
            $subject = 'Reliever Update';

            DB::table('tblguardstatus')->insert([
                ['intGuardID' => $replaceGuardID, 'intStatusIdentifier' => 3, 'dateEffectivity' => $now],//set for leave
                ['intGuardID' => $replaceGuardID, 'intStatusIdentifier' => 2, 'dateEffectivity' => $dateReturn],//return
                ['intGuardID' => $guardWaitingID, 'intStatusIdentifier' => 4, 'dateEffectivity' => $now],//set reliever
                ['intGuardID' => $guardWaitingID, 'intStatusIdentifier' => 0, 'dateEffectivity' => $dateReturn]//set waiting
            ]);

            DB::table('tblclientguard')->insert([
                ['intGuardID' => $replaceGuardID, 'intContractID' => $contractID, 'boolStatus' => 2, 'created_at' => $now],//set for leave
                ['intGuardID' => $replaceGuardID, 'intContractID' => $contractID, 'boolStatus' => 1, 'created_at' => $dateReturn],//return
                ['intGuardID' => $guardWaitingID, 'intContractID' => $contractID, 'boolStatus' => 3, 'created_at' => $now], //set reliever
                ['intGuardID' => $guardWaitingID, 'intContractID' => $contractID, 'boolStatus' => 0, 'created_at' => $dateReturn]//set waiting
            ]);

            DB::table('tblinbox')->insert([
                ['intAccountIDSender' => $adminAccountID, 'intAccountIDReceiver' => $replaceGuardInformation->intAccountID, 'strMessage' => $messageReplace, 'strSubject' => $subject, 'tinyintType' => 0],
                ['intAccountIDSender' => $adminAccountID, 'intAccountIDReceiver' => $guardWaitingInformation->intAccountID, 'strMessage' => $messageWaiting, 'strSubject' => $subject, 'tinyintType' => 0]
            ]);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }//try catch
    }
}
