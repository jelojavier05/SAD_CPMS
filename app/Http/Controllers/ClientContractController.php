<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;


class ClientContractController extends Controller
{
    
    public function index(){
        $contract = DB::table('tbltypeofcontract')
            ->select('*')
            ->where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        return view('/clientAdmin/clientContract')
            ->with('contract', $contract); 
    }
    
    public function getClientDetail(Request $request){
        if ($request->session()->has('contractClientID')){
            $id = $request->session()->get('contractClientID');
            
            $client = DB::table('tblclient')
                ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfBusinessID')
                ->join('tblclientaddress', 'tblclientaddress.intClientID','=', 'tblclient.intClientID')
                ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
                ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
                ->select('tblnatureofbusiness.strNatureOfBusiness', 'tblclient.*', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblnatureofbusiness.deciRate')
                ->where('tblclient.intClientID', $id)
                ->first();
            
            $shifts = DB::table('tblclientshift')
                ->join('tblclient', 'tblclient.intClientID', '=', 'tblclientshift.intClientID')
                ->select('tblclientshift.*')
                ->where('tblclient.intClientID', $id)
                ->get();
            
            $client->shifts = $shifts;
            
            return response()->json($client);    
        }
    }
    
    public function getGuardAccepted(Request $request){
        if ($request->session()->has('contractClientID')){
            $id = $request->session()->get('contractClientID');
            $guards = DB::table('tblclient')
                ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
                ->join('tblguardpendingnotification', 'tblguardpendingnotification.intClientPendingID', '=', 'tblclientpendingnotification.intClientPendingID')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
                ->select('tblguard.strFirstName', 'tblguard.strLastName')
                ->where('tblclient.intClientID', '=', $id)
                ->where('tblguardpendingnotification.intStatusIdentifier', '=', 3)
                ->get();

            return response()->json($guards);    
        }
    }
    
    public function getGunTagged(Request $request){
        $gunTagged = $request->session()->get('gunTagged');
        
        return response()->json($gunTagged);
    }
}