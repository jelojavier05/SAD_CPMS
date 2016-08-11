<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;

class SecurityHomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        return view('/securityguard/SecurityInbox');
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

        foreach($shift as $value){
            $value->timeFrom = date('h:i A', strtotime($value->timeFrom)); 
            $value->timeTo = date('h:i A', strtotime($value->timeTo)); 
        }
        
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
                ->where('intGuardID','=', $guardID)
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

    public function getLeaveRequestInformation(Request $request){
        $inboxID = Input::get('inboxID');

        $result = DB::table('tblinbox')
            ->join('tblguardleavenotification', 'tblguardleavenotification.intInboxID', '=','tblinbox.intInboxID')
            ->join('tblguardleaverequest', 'tblguardleaverequest.intGuardLeaveRequestID', '=', 'tblguardleavenotification.intGuardLeaveRequestID')
            ->join('tblclientguard', 'tblclientguard.intGuardID','=','tblguardleaverequest.intGuardID')
            ->join('tblcontract', 'tblcontract.intContractID', '=', 'tblclientguard.intContractID')
            ->join('tblclient', 'tblclient.intClientID','=','tblcontract.intClientID')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfbusinessID', '=','tblclient.intNatureOfbusinessID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID','=','tblclient.intClientID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=','tblclientaddress.intCityID')
            ->select('tblguardleaverequest.dateStart','tblguardleaverequest.dateEnd','tblclient.*', 'tblclientaddress.strAddress','tblcity.strCityName', 'tblprovince.strProvinceName', 'tblnatureofbusiness.strNatureOfBusiness', 'tblguardleavenotification.boolStatus')
            ->where('tblinbox.intInboxID', $inboxID)
            ->first();


        $shift = DB::table('tblclientshift')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblclientshift.intClientID')
            ->select('tblclientshift.*')
            ->where('tblclient.intClientID', $result->intClientID)
            ->get();
        
        foreach($shift as $value){
            $value->timeFrom = date('h:i A', strtotime($value->timeFrom)); 
            $value->timeTo = date('h:i A', strtotime($value->timeTo)); 
        }

        $result->shift = $shift;
        $result->dateStart = date('M d, Y', strtotime($result->dateStart));
        $result->dateEnd = date('M d, Y', strtotime($result->dateEnd));

        return response()->json($result);
    }

    public function acceptLeaveRequest(Request $request){
        $guardID = $request->session()->get('id');
        $accountID = $request->session()->get('accountID');
        $inboxID = $request->intInboxID;
        $now = Carbon::now();
        $result = DB::table('tblguardleavenotification')
            ->join('tblguardleaverequest', 'tblguardleaverequest.intGuardLeaveRequestID','=','tblguardleavenotification.intGuardLeaveRequestID')
            ->join('tblguard', 'tblguard.intGuardID', '=','tblguardleaverequest.intGuardID')
            ->select('tblguardleavenotification.intGuardLeaveRequestID', 'tblguardleaverequest.*', 'tblguard.strFirstName','tblguard.strLastName')
            ->where('tblguardleavenotification.intInboxID', $inboxID)
            ->first();
        
        $intGuardLeaveRequestID = $result->intGuardLeaveRequestID;
        $guardRequested = $result->intGuardID;
        $guardRequestedName = $result->strFirstName . ' ' . $result->strLastName;
        $dateLeaveStart = $result->dateStart;
        $dateLeaveEnd = $result->dateEnd;
        $dateReturn = new Carbon($dateLeaveEnd);
        $dateReturn = $dateReturn->addDays(1);

        $result = DB::table('tblguardleaverequest')
            ->join('tblguard','tblguard.intGuardID','=','tblguardleaverequest.intGuardID')
            ->join('tblclientguard', 'tblclientguard.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblclientguard.intContractID')
            ->where('tblguardleaverequest.intGuardLeaveRequestID', $intGuardLeaveRequestID)
            ->where('tblclientguard.created_at', '<=', $now)
            ->orderBy('tblclientguard.created_at','desc')
            ->first();
        
        $contractID = $result->intContractID;
        try{
            DB::beginTransaction();

            // Updating guard leave notification
            DB::table('tblguardleavenotification')
                ->where('intGuardLeaveRequestID',$intGuardLeaveRequestID)
                ->where('intGuardID',$guardID)
                ->update([
                    'boolStatus' => 2,
                    'updated_at' => $now
                ]); 

            $intGuardLeaveNotificationIDArray = DB::table('tblguardleavenotification')
                ->select('intGuardLeaveNotificationID')
                ->where('intGuardLeaveRequestID', $intGuardLeaveRequestID)
                ->where('boolStatus', 1)
                ->get();

            foreach($intGuardLeaveNotificationIDArray as $value){
                DB::table('tblguardleavenotification')
                    ->where('intGuardLeaveNotificationID', $value->intGuardLeaveNotificationID)
                    ->update([
                        'boolStatus' => 3,
                        'updated_at' => $now
                    ]);
            }

            DB::table('tblguardleaverequest')
                ->where('intGuardLeaveRequestID', $intGuardLeaveRequestID)
                ->update([
                    'boolStatus' => 2
                ]);

            DB::table('tblclientguard')
                ->insert([
                    ['intGuardID' => $guardRequested, 'boolStatus' => 2,'intContractID'=>$contractID ,'created_at' => $dateLeaveStart],
                    ['intGuardID' => $guardRequested, 'boolStatus' => 1,'intContractID'=>$contractID ,'created_at' => $dateReturn],
                    ['intGuardID' => $guardID, 'boolStatus' => 3,'intContractID'=>$contractID ,'created_at' =>$dateLeaveStart],
                    ['intGuardID' => $guardID, 'boolStatus' => 0,'intContractID'=>$contractID ,'created_at' =>$dateReturn]
                ]);

            DB::table('tblguard')
                ->where('intGuardID', $guardID)
                ->update(['intStatusIdentifier' => 2]);

            $result = DB::table('tblaccount')
                ->select('intAccountID')
                ->where('intAccountType', 3)
                ->first();
            $adminAccountID = $result->intAccountID;
            $messageForGuardRequested = 'Your leave request is now approved.';
            $messageForAdmin = 'I accepted the leave request of '. $guardRequestedName . '.'; 

            $accountIDRequested = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $guardRequested)
                ->first();

            DB::table('tblinbox')
                ->insert([
                    ['intAccountIDSender' => $adminAccountID,
                     'intAccountIDReceiver' => $accountIDRequested->intAccountID,
                     'strMessage' => $messageForGuardRequested,
                     'strSubject' => 'Leave Request Update',
                     'tinyintType' => 0],

                    ['intAccountIDSender' => $accountID,
                     'intAccountIDReceiver' =>$adminAccountID,
                      'strMessage' => $messageForAdmin,
                      'strSubject' => 'Leave Request Update',
                      'tinyintType' => 0]
                    ]);
            
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function declineLeaveRequest(Request $request){
        $guardID = $request->session()->get('id');
        $inboxID = $request->intInboxID;
        $now = Carbon::now();
        try{
            DB::beginTransaction();
            
            DB::table('tblguardleavenotification')
                ->where('intInboxID','=', $inboxID)
                ->where('intGuardID', $guardID)
                ->update(['boolStatus' => 0,'updated_at' => $now]);
            
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}

