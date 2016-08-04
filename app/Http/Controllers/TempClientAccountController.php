<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Model\BodyAttribute;
use App\Model\GovernmentExam;
use App\Http\Controllers\Controller;
use Validator;
use DB;

class TempClientAccountController extends Controller
{
    
    public function index(Request $request){
        if ($request->session()->has('accountType') && $request->session()->get('accountType') == 0){
            $bodyAttributes = BodyAttribute::where('deleted_at', null)
                ->where('boolFlag', 1)
                ->get();

            $governmentExams = GovernmentExam::where('deleted_at', null)
                ->where('boolFlag', 1)
                ->get();
            
            return view('/tempClientAccount')
                ->with('bodyAttributes', $bodyAttributes)
                ->with('governmentExams', $governmentExams);
        }else{
            return redirect('userlogin');
        }
    }
    
    public function getGuards(Request $request){
        $id = $request->session()->get('id');
            
        $guards = DB::table('tblclient')
            ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->join('tblguardpendingnotification', 'tblguardpendingnotification.intClientPendingID', '=', 'tblclientpendingnotification.intClientPendingID')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
            ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblguard.strFirstName', 'tblguard.strLastName', 'tblguardlicense.strLicenseNumber', 'tblguard.intGuardID')
            ->where('tblclient.intClientID', '=', $id)
            ->where('tblguardpendingnotification.intStatusIdentifier', '=', 2)
            ->get();
        
        if (is_null($guards)){
            return response()->json(false);
        }else{
            return response()->json($guards);    
        }
    }
    
    public function getClient(Request $request){
        $id = $request->session()->get('id');
        
        $client = DB::table('tblclient')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID','=', 'tblclient.intNatureOfBusinessID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID','=','tblclient.intClientID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
            ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->select('tblclient.*', 'tblnatureofbusiness.strNatureOfBusiness', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName','tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclient.intClientID', $id)
            ->first();
        
        return response()->json($client);
    }
    
}