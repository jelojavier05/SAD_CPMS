<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function getActiveClient(Request $request){
        $clientActive = DB::table('tblclient')
            ->select('*')
            ->where('intStatusIdentifier' , '=', 2)
            ->get();

        return response()->json($clientActive);
    }

    public function getActiveClientGuard(Request $request){
        $clientID = Input::get('id');
        $now = Carbon::now();

        $contractID = DB::table('tblcontract')
            ->select('intContractID')
            ->where('intClientID', $clientID)
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
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguard.strFirstName','tblguard.strLastName','tblguard.intGuardID', 'tblclientguard.boolStatus')
                ->where('tblclientguard.intGuardID', $value->intGuardID)
                ->where('tblclientguard.intContractID', $contractID->intContractID)
                ->where('tblclientguard.created_at', '<=', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            if ($result->boolStatus == 1 || $result->boolStatus == 2){     
                array_push($clientGuard, $result);
            }
        }
        return response()->json($clientGuard);
    }

    public function getGuardWaiting(){
        $now = Carbon::now();

        $arrGuard = DB::table('tblguard')
            ->join('tblguardaddress', 'tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblguardaddress.intProvinceID')
            ->join('tblcity','tblcity.intCityID', '=', 'tblguardaddress.intCityID')
            ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblprovince.strProvinceName','tblcity.strCityName')
            ->where('boolStatus', 1)
            ->get();
        $arrayGuardWaiting = array();
        foreach($arrGuard as $value){
            $currentStatus = DB::table('tblguardstatus')
                ->select('intStatusIdentifier')
                ->where('intGuardID', $value->intGuardID)
                ->where('dateEffectivity', '<=', $now)
                ->orderBy('dateEffectivity', 'desc')
                ->first();

            if ($currentStatus->intStatusIdentifier == 0){
                array_push($arrayGuardWaiting, $value);
            }
        }
        
        return response()->json($arrayGuardWaiting);
    }//function

}