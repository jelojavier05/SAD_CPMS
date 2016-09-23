<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class QueryClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){   
        $arrNatureOfBusiness = DB::table('tblnatureofbusiness')
            ->select('strNatureOfBusiness')
            ->where('deleted_at', null)
            ->get();

        $arrContractType = DB::table('tbltypeofcontract')
            ->select('strTypeOfContractName')
            ->where('deleted_at', null)
            ->get();

        $arrProvince = DB::table('tblprovince')
            ->select('strProvinceName', 'intProvinceID')
            ->where('deleted_at', null)
            ->get();

        return view('/queries/client')
            ->with('arrNatureOfBusiness', $arrNatureOfBusiness)
            ->with('arrContractType', $arrContractType)
            ->with('arrProvince', $arrProvince);
    }

    public function getCity(){
        $arrCity = DB::table('tblcity')
            ->select('strCityName', 'intProvinceID')
            ->where('deleted_at', null)
            ->get();

        return response()->json($arrCity);
    }

    public function getQueryClient(){
        $arrClient = DB::table('tblclient')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfBusinessID')
            ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblclient.intClientID')
            ->join('tbltypeofcontract', 'tbltypeofcontract.intTypeOfContractID', '=', 'tblcontract.intTypeOfContractID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
            ->select('tblnatureofbusiness.strNatureOfBusiness', 'tbltypeofcontract.strTypeOfContractName', 'tblclient.strClientName', 'tblclient.strPersonInCharge', 'tblprovince.strProvinceName', 'tblcity.strCityName')
            ->where('tblclient.intStatusIdentifier', 2)
            ->where('tblcontract.boolStatus', 1)
            ->get();

        return response()->json($arrClient);
    }
}
