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
            ->select('tblclientpendingnotification.intClientPendingID', 'tblclient.strClientName','tblclient.intClientID',  'tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclientpendingnotification.intStatusIdentifier', '=', '1')
            ->get();
        
        return view('/clientView')
            ->with('clientPending', $clientPending);
    }
    
    public function getClientPending(){
        $clientPending = DB::table('tblclientpendingnotification')
            ->join('tblclient', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->select('tblclientpendingnotification.intClientPendingID', 'tblclient.strClientName','tblclient.intClientID',  'tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclientpendingnotification.intStatusIdentifier', '=', '1')
            ->get();
        
        return respone()->json($clientPending);
    }
    
    public function getGuardWaiting(){
        $guardWaiting = DB::table('tblguard')
            ->join('tblguardaddress', 'tblguard.intGuardID', '=', 'tblguardaddress.intGuardID')
            ->join('tblprovince', 'tblguardaddress.intProvinceID', '=', 'tblprovince.intProvinceID')
            ->join('tblcity', 'tblguardaddress.intCityID', '=', 'tblcity.intCityID')
            ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblguard.dateBirthday', 'tblprovince.strProvinceName','tblcity.strCityName')
            ->where('tblguard.intStatusIdentifier','=', '0')
            ->where('tblguard.deleted_at', '=', null)
            ->get();
        
        return response()->json($guardWaiting);
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
    
    public function getPendingNotification(){
        $notificationID = Input::get('notificationID');
        $guardHasNotification = DB::table('tblguardpendingnotification')
            ->select('intGuardID')
            ->where('intClientPendingID', '=', $notificationID)
            ->get();
        
        return response()->json($guardHasNotification);
    }
}