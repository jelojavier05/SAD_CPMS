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
            ->select('tblguard.intGuardID','tblguard.strFirstName','tblguard.strLastName', 'tblguardaddress.strAddress','tblprovince.strProvinceName',
                'tblcity.strCityName')
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
}
