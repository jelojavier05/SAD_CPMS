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
                return view('securityguard.SecurityInbox');
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
                ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblguardlicense.strLicenseNumber', 'tblguard.intStatusIdentifier')
                ->where('tblguard.intGuardID', '=', $id)
                ->first();
            
            return response()->json($guard);
        }else{
            return response()->json(false);;
        }
    }//getGuardInformation
    
    public function getClientInformation(Request $request){
        $id = Input::get('inboxID');
        $clientInformation = DB::table('tblinbox')
            ->join('tblguardpendingnotification', 'tblguardpendingnotification.intInboxID', '=', 'tblinbox.intInboxID')
            ->join('tblclientpendingnotification','tblclientpendingnotification.intClientPendingID', '=' 
                ,'tblguardpendingnotification.intClientPendingID')
            ->join('tblclient', 'tblclient.intClientID', '=','tblclientpendingnotification.intClientID')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfbusinessID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince', 'tblprovince.intProvinceID','=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID','=', 'tblclientaddress.intCityID')
            ->select('tblclient.*', 'tblnatureofbusiness.strNatureOfBusiness', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblclientpendingnotification.intNumberOfGuard', 'tblguardpendingnotification.intStatusIdentifier')
            ->where('tblinbox.intInboxID', '=', $id)
            ->first();
        
        $shift = DB::table('tblclientshift')
            ->select('*')
            ->where('intClientID', '=', $clientInformation->intClientID)
            ->get();
        
        $clientInformation->shift = $shift;
        return response()->json($clientInformation);
    }
    
    public function acceptNewClient(Request $request){
        $guardID = $request->session()->get('id');
        $inboxID = $request->inboxID;
        try{
            DB::beginTransaction();
            
            $result = DB::table('tblguardpendingnotification')
                ->select('intClientPendingID')
                ->where('intInboxID', $inboxID)
                ->first();
            $clientPendingID = $result->intClientPendingID;

            DB::table('tblguardpendingnotification')
                ->where('intClientPendingID','=', $clientPendingID)
                ->where('intGuardID','=', $guardID)
                ->update(['intStatusIdentifier' => 2]);

            DB::table('tblguard')
                ->where('intGuardID','=', $guardID)
                ->update(['intStatusIdentifier' => 1]);
            
            $result = DB::table('tblclientpendingnotification')
                ->select('intNumberOfGuard')
                ->where('intClientPendingID', $clientPendingID)
                ->first();
            $countNeedGuard = $result->intNumberOfGuard;
        
            $countAccepted = DB::table('tblguardpendingnotification')
                ->where('intClientPendingID', $clientPendingID)
                ->where('intStatusIdentifier', 2)
                ->count();
            
            if ($countNeedGuard == $countAccepted){
                $countGuardSend = DB::table('tblguardpendingnotification')
                    ->select('intGuardPendingID')
                    ->where('intClientPendingID','=', $clientPendingID)
                    ->get();
                    
                foreach($countGuardSend as $value){
                    DB::table('tblguardpendingnotification')
                        ->where('intGuardPendingID','=', $value->intGuardPendingID)
                        ->where('intStatusIdentifier', 1)
                        ->update(['intStatusIdentifier' => 3]);
                }

                $adminAccountID = DB::table('tblaccount')
                    ->select('intAccountID')
                    ->where('intAccountType', 3)
                    ->first();

                $clientAccount = DB::table('tblclientpendingnotification')
                    ->join('tblclient', 'tblclient.intClientID','=','tblclientpendingnotification.intClientID')
                    ->join('tblaccount', 'tblaccount.intAccountID','=','tblclient.intAccountID')
                    ->select('tblaccount.intAccountID','tblclient.strClientName')
                    ->where('tblclientpendingnotification.intClientPendingID', $clientPendingID)
                    ->first();

                $messageStringAdmin = 'The guards are now complete. ' . $clientAccount->strClientName . ' is ready for contract.';
                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $clientAccount->intAccountID,
                    'intAccountIDReceiver' => $adminAccountID->intAccountID,
                    'strSubject' => 'New Client Ready',
                    'strMessage' => $messageStringAdmin,
                    'tinyintType' => 0
                ]);//inbox for admin

                $messageStringClient = 'The guards are now complete. You can finalize your contract in the office.';
                DB::table('tblinbox')->insert([
                    'intAccountIDSender' => $adminAccountID->intAccountID,
                    'intAccountIDReceiver' => $clientAccount->intAccountID,
                    'strSubject' => 'Guard Complete',
                    'strMessage' => $messageStringClient,
                    'tinyintType' => 0
                ]);//inbox for admin
            }//if else

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
    
    public function declineNewClient(Request $request){
        $guardID = $request->session()->get('id');
        $inboxID = $request->inboxID;
        try{
            DB::beginTransaction();
            

            DB::table('tblguardpendingnotification')
                ->where('intInboxID','=', $inboxID)
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
    
    public function getInbox(Request $request){
        $accountID = $request->session()->get('accountID');
        
        $inbox = DB::table('tblinbox')
            ->join('tblaccount' ,'tblaccount.intAccountID','=', 'tblinbox.intAccountID')
            ->select('tblinbox.strSubject', 'tblinbox.intInboxID', 'tblinbox.datetimeSend', 'tblinbox.boolStatus')
            ->where('tblinbox.intAccountID', $accountID)
            ->get();
            
        return response()->json($inbox);
    }
    
    public function getInboxMessage(Request $request){
        $id = Input::get('id');
        
        $message = DB::table('tblinbox')
            ->select('strSubject', 'strMessage')
            ->where('intInboxID', $id)
            ->first();
        
        return response()->json($message);
    }
    
    public function readNewInbox(Request $request){
        

        DB::table('tblinbox')
            ->where('intInboxID','=', $request->id)
            ->update(['boolStatus' => 0]);
    }
}

