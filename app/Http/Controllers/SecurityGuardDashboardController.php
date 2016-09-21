<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class SecurityGuardDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('securityguard.SecurityGuardDashboard');
    }

    public function getClientInformation(Request $request){
        $guardID = $request->session()->get('id');
        $now = Carbon::now();
        $clientInformation = DB::table('tblclientguard')
            ->join('tblcontract', 'tblcontract.intContractID','=','tblclientguard.intContractID')
            ->join('tblclient','tblclient.intClientID', '=', 'tblcontract.intClientID')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID','=','tblclient.intNatureOfBusinessID')
            ->join('tblclientaddress','tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince','tblprovince.intProvinceID', '=' ,'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID','=','tblclientaddress.intCityID')
            ->select('tblclient.*', 'tblnatureofbusiness.strNatureOfBusiness', 'tblclientaddress.strAddress','tblprovince.strProvinceName','tblcity.strCityName')
            ->where('tblclientguard.intGuardID', $guardID)
            ->where('tblclientguard.boolStatus', 1)
            ->where('tblclientguard.created_at', '<=', $now)
            ->orderBy('tblclientguard.created_at', 'desc')
            ->first();
        
        return response()->json($clientInformation);
    }

    public function isLicenseUpdated(Request $request){
        $guardID = $request->session()->get('id');
        $expirationDate = Carbon::now();
        $expirationDate->addMonths(2);

        $result = DB::table('tblguardlicense')
            ->where('dateExpiration', '<=', $expirationDate)
            ->where('intGuardID', $guardID)
            ->count();

        return response()->json($result);
    }
}
