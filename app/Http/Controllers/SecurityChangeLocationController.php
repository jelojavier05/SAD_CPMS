<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Input;

class SecurityChangeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){   

        $id = $request->session()->get('id');
        $now = Carbon::now();
        
        $guard = DB::table('tblguard')
            ->join('tblguardstatus', 'tblguardstatus.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblguardstatus.intStatusIdentifier')
            ->where('tblguard.intGuardID', '=', $id)
            ->where('tblguardstatus.dateEffectivity','<', $now)
            ->orderBy('tblguardstatus.dateEffectivity', 'desc')
            ->first();

        if ($guard->intStatusIdentifier == 2){
            $clientID = DB::table('tblclientguard')
                ->join('tblcontract', 'tblcontract.intContractID', '=', 'tblclientguard.intContractID')
                ->select('tblcontract.intClientID')
                ->where('tblclientguard.intGuardID', $id)
                ->where('tblcontract.boolStatus', 1)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();
            
            $clients = DB::table('tblclient')
                ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=','tblclient.intNatureOfBusinessID')
                ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
                ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
                ->join('tblcity','tblcity.intCityID','=','tblclientaddress.intCityID')
                ->select('tblclient.intClientID','tblclient.strClientName' ,'tblclient.strContactNumber','tblnatureofbusiness.strNatureOfBusiness', 'tblprovince.strProvinceName', 'tblcity.strCityName')
                ->where('tblclient.intStatusIdentifier', 2)
                ->where('tblclient.intClientID', '<>', $clientID->intClientID)
                ->get();
            return view('/securityguard/SecurityChangeLocation')
                ->with('clients', $clients);
        }else{
            return redirect('/securityHome');
        }

            
    }

    public function getClientActiveGuards(Request $request){
        $clientID = Input::get('clientID');
        $now = Carbon::now();
        
        $guardID = DB::table('tblclient')
            ->join('tblcontract', 'tblcontract.intClientID', '=','tblclient.intClientID')
            ->join('tblclientguard' ,'tblclientguard.intContractID', '=','tblcontract.intContractID')
            ->join('tblguard', 'tblguard.intGuardID', '=','tblclientguard.intGuardID')
            ->select('tblguard.intGuardID')
            ->where('tblclient.intClientID', $clientID)
            ->groupBy('tblclientguard.intGuardID')
            ->get();

        $clientGuard = array();
        foreach($guardID as $value){
            $result = DB::table('tblclientguard')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->join('tblguardaddress', 'tblguardaddress.intGuardID','=','tblguard.intGuardID')
                ->join('tblprovince','tblprovince.intProvinceID','=','tblguardaddress.intProvinceID')
                ->join('tblcity','tblcity.intCityID','=','tblguardaddress.intCityID')
                ->select('tblguard.strFirstName','tblguard.strLastName', 'tblguard.intGuardID','tblprovince.strProvinceName','tblcity.strCityName', 'tblclientguard.boolStatus')
                ->where('tblclientguard.intGuardID' ,$value->intGuardID)
                ->where('tblclientguard.created_at', '<', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            $countLeaveRequestActive = DB::table('tblguardleaverequest')
                ->where('intGuardID', $value->intGuardID)
                ->where('boolStatus', 1)
                ->count();

            $guard = DB::table('tblguard')
                ->join('tblguardstatus', 'tblguardstatus.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguardstatus.intStatusIdentifier')
                ->where('tblguard.intGuardID', '=', $value->intGuardID)
                ->where('tblguardstatus.dateEffectivity','<', $now)
                ->orderBy('tblguardstatus.dateEffectivity', 'desc')
                ->first();
            
            if ($result->boolStatus == 1 && $guard->intStatusIdentifier == 2 && $countLeaveRequestActive == 0){   
                //first - kung active siya dun sa client na yon
                //second - kung nakadeploy ba talaga siya at hindi lang siya reliever
                //third - kung wala siyang pending na request leave
                array_push($clientGuard, $result);
            }
        }
        return response()->json($clientGuard);
    }
}
