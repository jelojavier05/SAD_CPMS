<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;

class SecurityHomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        
        if ($request->session()->has('id')){
            $accountType = $request->session()->get('accountType');
            
            if ($accountType == 2){
                return view('securityguard.SecurityHomepage');
            }else{
                return redirect('/userlogin');
            }
        }else{
            return redirect('/userlogin');
        }
    }
    
    public function getGuardInformation(Request $request){
        
        if ($request->session()->has('id')){
            $id = $request->session()->get('id');
            
            $guard = DB::table('tblguard')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblguardlicense.strLicenseNumber')
                ->where('tblguard.intGuardID', '=', $id)
                ->first();
            
            return response()->json($guard);
        }else{
            return response()->json(false);;
        }
    }//getGuardInformation
    
    public function getNewClientRequest(Request $request){
        if ($request->session()->has('id')){
            $id = $request->session()->get('id');
            
            $newClientRequest = DB::table('tblguardpendingnotification')
                ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientPendingID', '=', 'tblguardpendingnotification.intClientPendingID')
                ->select('tblguardpendingnotification.*', 'tblclientpendingnotification.intClientID')
                ->where('intGuardID', '=', $id)
                ->get();
            
            return response()->json($newClientRequest);
        }else{
            return response()->json(false);
        }
    }
    
    public function getClientInformation(Request $request){
        $id = Input::get('clientID');
        
        $clientInformation = DB::table('tblclient')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfbusinessID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince', 'tblprovince.intProvinceID','=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID','=', 'tblclientaddress.intCityID')
            ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientID','=', 'tblclient.intClientID')
            ->select('tblclient.*', 'tblnatureofbusiness.strNatureOfBusiness', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclient.intClientID', '=', $id)
            ->first();
        
        $shift = DB::table('tblclientshift')
            ->select('*')
            ->where('intClientID', '=', $id)
            ->get();
        
        $clientInformation->shift = $shift;
        
        return response()->json($clientInformation);
    }
    
    public function readNewClient(Request $request){
        DB::table('tblguardpendingnotification')
            ->where('intGuardPendingID','=', $request->id)
            ->update(['intStatusIdentifier' => 2]);
    }
    
    public function acceptNewClient(Request $request){
        $guardID = $request->session()->get('id');
        $clientPendingID = $request->clientPendingID;
        try{
            DB::beginTransaction();
            
            DB::table('tblguardpendingnotification')
                ->where('intGuardPendingID','=', $clientPendingID)
                ->update(['intStatusIdentifier' => 3]);

            DB::table('tblguard')
                ->where('intGuardID','=', $request->session()->get('id'))
                ->update(['intStatusIdentifier' => 1]);
            
            $countNeedGuard = DB::table('tblclientpendingnotification')
                ->select('intNumberOfGuard')
                ->where('intClientPendingID', $clientPendingID)
                ->first();
        
            $countAccepted = DB::table('tblguardpendingnotification')
                ->where('intClientPendingID', $clientPendingID)
                ->where('intStatusIdentifier', 3)
                ->count();
            
            if ($countNeedGuard->intNumberOfGuard == $countAccepted){
                $countGuardSend = DB::table('tblguardpendingnotification')
                    ->select('intGuardPendingID')
                    ->where('intClientPendingID','=', $clientPendingID)
                    ->get();
                
                foreach($countGuardSend as $value){
                    DB::table('tblguardpendingnotification')
                        ->where('intGuardPendingID','=', $value->intGuardPendingID)
                        ->where('intStatusIdentifier', 1)
                        ->orWhere('intStatusIdentifier', 2)
                        ->update(['intStatusIdentifier' => 4]);
                }
                
                    
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
    
    public function declineNewClient(Request $request){
        $guardID = $request->session()->get('id');
        try{
            DB::beginTransaction();
            
            DB::table('tblguardpendingnotification')
                ->where('intGuardPendingID','=', $request->clientPendingID)
                ->update(['intStatusIdentifier' => 0]);
            
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
    
    public function getStatusIdentifierGuardPendingRequest(Request $request){
        $id = Input::get('id');
        
        $status = DB::table('tblguardpendingnotification')
            ->select('intStatusIdentifier')
            ->where('intGuardPendingID', $id)
            ->first();
        
        return response()->json($status);
    }
}

