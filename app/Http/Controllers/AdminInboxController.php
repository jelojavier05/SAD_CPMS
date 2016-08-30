<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class AdminInboxController extends Controller
{
   
    public function index(){
        return view('/adminInbox');
    }
    
    public function getGuardWaiting(){
        $now = Carbon::now();
        
        $guardID = DB::table('tblguard')
            ->select('intGuardID')
            ->where('boolStatus', 1)
            ->get();

        $guardWaiting = array();
        foreach($guardID as $value){
            $result = DB::table('tblguardstatus')
                ->select('intStatusIdentifier')
                ->where('intGuardID', $value->intGuardID)
                ->where('dateEffectivity', '<', $now)
                ->orderBy('dateEffectivity', 'desc')
                ->first();

            if ($result->intStatusIdentifier == 0){
                $guardResult = DB::table('tblguard')
                    ->join('tblguardaddress', 'tblguard.intGuardID', '=', 'tblguardaddress.intGuardID')
                    ->join('tblprovince', 'tblguardaddress.intProvinceID', '=', 'tblprovince.intProvinceID')
                    ->join('tblcity', 'tblguardaddress.intCityID', '=', 'tblcity.intCityID')
                    ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblguard.dateBirthday', 'tblprovince.strProvinceName','tblcity.strCityName')
                    ->where('tblguard.intGuardID', $value->intGuardID)
                    ->first();        

                array_push($guardWaiting, $guardResult);
            }
        }
        return response()->json($guardWaiting);
    }

    public function getNewClientNumberOfGuard(Request $request){
        $id = Input::get('id');
        
        $guardNumber = DB::table('tblinbox')
            ->join('tblclientpendingnotification', 'tblclientpendingnotification.intInboxID','=','tblinbox.intInboxID')
            ->select('intNumberOfGuard')
            ->where('tblinbox.intInboxID',$id)
            ->first();
        
        return response()->json($guardNumber);
    }
    
    public function sendGuardPendingNotification(Request $request){
        $arrayGuardID = $request->guardWaiting; 
        $inboxID = $request->inboxID;
        $guardID = array(); 
        $accountID = $request->session()->get('accountID');
        
        for ($intLoop = 0; $intLoop < count($arrayGuardID); $intLoop ++){
            $value = new \stdClass();
            $value->intGuardID = $arrayGuardID[$intLoop];
            $accountGuardID = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $arrayGuardID[$intLoop])
                ->first();

            $value->intAccountID = $accountGuardID->intAccountID;
            array_push($guardID, $value);
        }
        
        try{
            DB::beginTransaction();
            $clientPendingID = DB::table('tblclientpendingnotification')
                ->select('intClientPendingID')
                ->where('intInboxID', $inboxID)
                ->first();
            
            foreach ($guardID as $value){   
                $inboxID = DB::table('tblinbox')->insertGetId([
                    'intAccountIDSender' => $accountID,
                    'intAccountIDReceiver' =>$value->intAccountID,
                    'strSubject' => 'New Client',
                    'tinyintType' => 2
                ]);
                
                DB::table('tblguardpendingnotification')->insert([
                    'intClientPendingID' => $clientPendingID->intClientPendingID,
                    'intGuardID' => $value->intGuardID,
                    'intInboxID' => $inboxID
                ]);
            }
            
            
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }
    }

    public function getMessage(){
        $inboxID = Input::get('inboxID');

        $message = DB::table('tblinbox')
            ->select('strSubject','strMessage')
            ->where('intInboxID', $inboxID)
            ->first();

        return response()->json($message);
    }

    public function getGuardHasNotification(){
        $inboxID = Input::get('id');

        $clientPendingID = DB::table('tblclientpendingnotification')
            ->select('intClientPendingID')
            ->where('intInboxID', $inboxID)
            ->first();

        $guardHasNotification = DB::table('tblguardpendingnotification')
            ->select('intGuardID')
            ->where('intClientPendingID', '=', $clientPendingID->intClientPendingID)
            ->get();

        return response()->json($guardHasNotification);
    }

    public function getClientPendingNotificationStatus(){
        $inboxID = Input::get('inboxID');

        $statusIdentifier = DB::table('tblclientpendingnotification')
            ->select('intStatusIdentifier')
            ->where('intInboxID', $inboxID)
            ->first();
        return response()->json($statusIdentifier);
    }

    public function getGuardRequestLeaveInformation(){
        $inboxID = Input::get('inboxID');

        $result = DB::table('tblguardleaverequest')
            ->join('tblguard', 'tblguard.intGuardID', '=','tblguardleaverequest.intGuardID')
            ->join('tblleave', 'tblleave.intLeaveID', '=','tblguardleaverequest.intLeaveID')
            ->select('tblguard.intGuardID', 'tblleave.strLeaveType', 'tblguardleaverequest.strReason', 'tblguardleaverequest.boolStatus', 'tblguardleaverequest.dateStart', 'tblguardleaverequest.dateEnd')
            ->where('tblguardleaverequest.intInboxID', $inboxID)
            ->first();

        $clientName = DB::table('tblclientguard')
            ->join('tblcontract','tblcontract.intContractID', '=', 'tblclientguard.intContractID')
            ->join('tblclient', 'tblclient.intClientID','=','tblcontract.intClientID')
            ->select('tblclient.strClientName')
            ->where('tblclientguard.intGuardID', $result->intGuardID)
            ->orderBy('tblclientguard.intClientGuardID', 'desc')
            ->first();
        $result->strClientName = $clientName->strClientName;
        
        return response()->json($result);
    }

    public function getGuardHasNotificationLeaveRequest(Request $request){
        $inboxID = Input::get('inboxID');

        $leaveRequestID = DB::table('tblguardleaverequest')
            ->select('intGuardLeaveRequestID')
            ->where('intInboxID',$inboxID)
            ->first();

        $guardHasNotification = DB::table('tblguardleavenotification')
            ->select('intGuardID')
            ->where('intGuardLeaveRequestID', $leaveRequestID->intGuardLeaveRequestID)
            ->get();

        return response()->json($guardHasNotification);
    }

    public function sendLeaveRequestNotification(Request $request){
        $arrayGuardID = $request->guardWaiting; 
        $inboxID = $request->inboxID;
        $guardID = array(); 
        $accountID = $request->session()->get('accountID');
        
        for ($intLoop = 0; $intLoop < count($arrayGuardID); $intLoop ++){
            $value = new \stdClass();
            $value->intGuardID = $arrayGuardID[$intLoop];
            $accountGuardID = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $arrayGuardID[$intLoop])
                ->first();

            $value->intAccountID = $accountGuardID->intAccountID;
            array_push($guardID, $value);
        }
        
        try{
            DB::beginTransaction();
            $guardLeaveRequestID = DB::table('tblguardleaverequest')
                ->select('intGuardLeaveRequestID')
                ->where('intInboxID', $inboxID)
                ->first();
            
            foreach ($guardID as $value){   
                $inboxID = DB::table('tblinbox')->insertGetId([
                    'intAccountIDSender' => $accountID,
                    'intAccountIDReceiver' =>$value->intAccountID,
                    'strSubject' => 'Leave Reliever',
                    'tinyintType' => 3
                ]);
                
                DB::table('tblguardleavenotification')->insert([
                    'intGuardLeaveRequestID' => $guardLeaveRequestID->intGuardLeaveRequestID,
                    'intGuardID' => $value->intGuardID,
                    'intInboxID' => $inboxID
                ]);
            }
            
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }
    }

    public function getRequestInformation(Request $request){
        $id = Input::get('id');
        
        $guardNumber = DB::table('tblinbox')
            ->join('tblclientpendingnotification', 'tblclientpendingnotification.intInboxID','=','tblinbox.intInboxID')
            ->select('tblclientpendingnotification.intNumberOfGuard', 'tblinbox.strMessage')
            ->where('tblinbox.intInboxID',$id)
            ->first();
        
        return response()->json($guardNumber);
    }

    public function sendAdditionalGuardNotification(Request $request){
        $arrayGuardID = $request->guardWaiting; 
        $inboxID = $request->inboxID;
        $guardID = array(); 
        $accountID = $request->session()->get('accountID');
        
        for ($intLoop = 0; $intLoop < count($arrayGuardID); $intLoop ++){
            $value = new \stdClass();
            $value->intGuardID = $arrayGuardID[$intLoop];
            $accountGuardID = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $arrayGuardID[$intLoop])
                ->first();

            $value->intAccountID = $accountGuardID->intAccountID;
            array_push($guardID, $value);
        }
        
        try{
            DB::beginTransaction();
            $clientPendingID = DB::table('tblclientpendingnotification')
                ->select('intClientPendingID')
                ->where('intInboxID', $inboxID)
                ->first();
            
            foreach ($guardID as $value){   
                $inboxID = DB::table('tblinbox')->insertGetId([
                    'intAccountIDSender' => $accountID,
                    'intAccountIDReceiver' =>$value->intAccountID,
                    'strSubject' => 'Additional Guard',
                    'tinyintType' => 6
                ]);
                
                DB::table('tblguardpendingnotification')->insert([
                    'intClientPendingID' => $clientPendingID->intClientPendingID,
                    'intGuardID' => $value->intGuardID,
                    'intInboxID' => $inboxID
                ]);
            }
            
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }
    }

    public function getAdditionalGuardInformation(Request $request){
        $inboxID = Input::get('inboxID');
        
        $result = DB::table('tblinbox')
            ->select('intAccountIDSender')
            ->where('intInboxID', $inboxID)
            ->first();
        $accountIDSender = $result->intAccountIDSender;

        $result = DB::table('tblaccount')
            ->join('tblclient', 'tblclient.intAccountID', '=', 'tblaccount.intAccountID')
            ->join('tblclientpendingnotification','tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->select('tblclientpendingnotification.intClientPendingID')
            ->where('tblaccount.intAccountID', $accountIDSender)
            ->orderBy('tblclientpendingnotification.intClientPendingID', 'desc')
            ->first();
        $clientPendingID = $result->intClientPendingID;

        $requestInformation = DB::table('tblclientpendingnotification')
            ->join('tblinbox', 'tblinbox.intInboxID', '=', 'tblclientpendingnotification.intInboxID')
            ->select('tblinbox.strMessage', 'tblclientpendingnotification.intNumberOfGuard')
            ->where('tblclientpendingnotification.intClientPendingID', $clientPendingID)
            ->first();

        
        $result = DB::table('tblguardpendingnotification')
            ->join('tblguard','tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
            ->select('tblguard.strFirstName','tblguard.strLastName', 'tblguard.strGender')
            ->where('tblguardpendingnotification.intClientPendingID', $clientPendingID)
            ->where('tblguardpendingnotification.intStatusIdentifier', 2)
            ->get();

        $requestInformation->guards = $result;

        return response()->json($requestInformation);
    }

    public function setAdditionalGuardID(Request $request){
        $inboxID = $request->inboxID;
        $result = DB::table('tblinbox')
            ->select('intAccountIDSender')
            ->where('intInboxID', $inboxID)
            ->first();
        $accountIDSender = $result->intAccountIDSender;

        $result = DB::table('tblaccount')
            ->join('tblclient', 'tblclient.intAccountID', '=', 'tblaccount.intAccountID')
            ->join('tblclientpendingnotification','tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
            ->select('tblclientpendingnotification.intClientPendingID')
            ->where('tblaccount.intAccountID', $accountIDSender)
            ->orderBy('tblclientpendingnotification.intClientPendingID', 'desc')
            ->first();
        $clientPendingID = $result->intClientPendingID;

        $request->session()->put('additionalGuardID', $clientPendingID);
    }       
}