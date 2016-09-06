<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Input;

class ClientViewController extends Controller
{
    
    public function index(){
        
        $clientPending = DB::table('tblclientpendingnotification')
            ->join('tblclient', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->select('tblclientpendingnotification.intClientPendingID', 'tblclient.strClientName','tblclient.intClientID','tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclientpendingnotification.intStatusIdentifier', '=', 1)
            ->get();
        
        $clientActive = DB::table('tblclient')
            ->select('strClientName', 'strPersonInCharge', 'intClientID')
            ->where('intStatusIdentifier' , '=', 2)
            ->get();
            
        
        return view('/clientView')
            ->with('clientPending', $clientPending)
            ->with('clientActive', $clientActive);
    }
    
    public function getClientPending(){
        $clientPending = DB::table('tblclientpendingnotification')
            ->join('tblclient', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->select('tblclientpendingnotification.intClientPendingID', 'tblclient.strClientName','tblclient.intClientID',  'tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclientpendingnotification.intStatusIdentifier', '=', '1')
            ->get();
        
        return response()->json($clientPending);
    }
    
    public function sendGuardPendingNotification(Request $request){
        $arrayGuardID = $request->guardWaiting;
        $clientPendingID = $request->clientPendingID;
        $guardID = array(); 
        
        for ($intLoop = 0; $intLoop < count($arrayGuardID); $intLoop ++){
            $value = new \stdClass();
            $value->intGuardID = $arrayGuardID[$intLoop];
            array_push($guardID, $value);
        }
        
        try{
            DB::beginTransaction();
            foreach ($guardID as $value){
                
                DB::table('tblguardpendingnotification')->insert([
                    'intClientPendingID' => $clientPendingID,
                    'intGuardID' => $value->intGuardID
                ]);
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }
            
    }
    
    public function getGuardAccept(Request $request){
        $clientPendingID = Input::get('notificationID');
        
        $guards = DB::table('tblclientpendingnotification')
            ->join('tblguardpendingnotification', 'tblclientpendingnotification.intClientPendingID', '=', 'tblguardpendingnotification.intClientPendingID')
            ->join('tblguard', 'tblguardpendingnotification.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblguard.strFirstName', 'tblguard.strLastName')
            ->where('tblclientpendingnotification.intClientPendingID', '=', $clientPendingID)
            ->where('tblguardpendingnotification.intStatusIdentifier', '=', 2)
            ->get();
        
        return response()->json($guards);
    }
    
    public function getSelectedClientPending(Request $request){
        $clientPendingID = Input::get('notificationID');
        
        $client = DB::table('tblclientpendingnotification')
            ->join('tblclient', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfBusinessID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince', 'tblclientaddress.intProvinceID', '=', 'tblprovince.intProvinceID')
            ->join('tblcity', 'tblclientaddress.intCityID', '=', 'tblcity.intCityID')
            ->select('tblclient.*', 'tblnatureofbusiness.strNatureOfBusiness', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclientpendingnotification.intClientPendingID', '=', $clientPendingID)
            ->first();
        
        return response()->json($client);
    }
    
    public function getGuardAccepted(Request $request){
        $clientPendingID = Input::get('notificationID');
        
        $countNeedGuard = DB::table('tblclientpendingnotification')
            ->select('intNumberOfGuard')
            ->where('intClientPendingID', $clientPendingID)
            ->first();
        
        $countAccepted = DB::table('tblguardpendingnotification')
            ->where('intClientPendingID', $clientPendingID)
            ->where('intStatusIdentifier', 2)
            ->count();

        $code = DB::table('tblclientpendingnotification')
            ->select('strCode')
            ->where('intClientPendingID', $clientPendingID)
            ->first();
        
        $count = new \stdClass();
        $count->countNeedGuard = $countNeedGuard;
        $count->countAccepted = $countAccepted;
        $count->code = $code->strCode;
        
        return response()->json($count);
    }
    
    public function post(Request $request){
        $request->session()->put('contractClientID', $request->clientID);
    }

    public function getClient(Request $request){
        $id = Input::get('clientID');
        
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