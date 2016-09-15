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

        $removeGuardData = DB::table('tblremoveguardheader')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblremoveguardheader.intClientID')
            ->select('tblremoveguardheader.*', 'tblclient.strClientName')
            ->where('tblremoveguardheader.intInboxID', $inboxID)
            ->first();

        $guards = DB::table('tblremoveguarddetail')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblremoveguarddetail.intGuardID')
            ->join('tblguardaddress', 'tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblguardaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblguardaddress.intCityID')
            ->select('tblguard.intGuardID','tblguard.strFirstName','tblguard.strLastName', 'tblguardaddress.strAddress','tblprovince.strProvinceName','tblcity.strCityName', 'tblguard.strGender')
            ->where('intRemoveGuardHeaderID', $removeGuardData->intRemoveGuardHeaderID)
            ->get();

        $removeGuardData->guards = $guards;

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
                    ->select('tblcontract.intContractID', 'tblclient.strClientName', 'tblclient.intAccountID')
                    ->where('tblremoveguardheader.intInboxID', $inboxID)
                    ->where('tblcontract.boolStatus', 1)
                    ->first();

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
                $clientMessage = 'We accepted your remove guard request. Effectivity Date: ' . $effectivityDate->toFormattedDateString() . '.';
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
