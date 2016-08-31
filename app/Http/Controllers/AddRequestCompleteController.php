<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class AddRequestCompleteController extends Controller
{
    public function index(Request $request){

        if ($request->session()->has('additionalGuardID')){
            $clientPendingID = $request->session()->get('additionalGuardID');
            $requestInformation = DB::table('tblclientpendingnotification')
                ->join('tblinbox', 'tblinbox.intInboxID', '=', 'tblclientpendingnotification.intInboxID')
                ->join('tblclient', 'tblclient.intClientID', '=', 'tblclientpendingnotification.intClientID')
                ->select('tblinbox.strMessage', 'tblclientpendingnotification.intNumberOfGuard','tblclient.strClientName')
                ->where('tblclientpendingnotification.intClientPendingID', $clientPendingID)
                ->first();
            
            $result = DB::table('tblguardpendingnotification')
                ->join('tblguard','tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID','=','tblguard.intGuardID')
                ->select('tblguard.strFirstName','tblguard.strLastName','tblguard.strGender', 'tblguardlicense.strLicenseNumber','tblguard.intGuardID')
                ->where('tblguardpendingnotification.intClientPendingID', $clientPendingID)
                ->where('tblguardpendingnotification.intStatusIdentifier', 2)
                ->get();

            $requestInformation->guards = $result;

            return view('/addrequestcomplete')
                ->with('requestInformation', $requestInformation);
        }else{
            return redirect('/adminInbox');
        }

        
    }

    public function proceedToFinalization(Request $request){
        if ($request->session()->has('additionalGuardID')){
            try{
                DB::beginTransaction();
                $now = Carbon::now();
                $clientPendingID = $request->session()->get('additionalGuardID');

                $result = DB::table('tblclientpendingnotification')
                    ->join('tblclient', 'tblclient.intClientID', '=', 'tblclientpendingnotification.intClientID')
                    ->select('tblclient.strClientName', 'tblclient.intClientID')
                    ->where('tblclientpendingnotification.intClientPendingID', $clientPendingID)
                    ->first();
                $clientName = $result->strClientName;
                $clientID = $result->intClientID;

                $result = DB::table('tblcontract')
                    ->select('intContractID')
                    ->where('intClientID', $clientID)
                    ->where('boolStatus', 1)
                    ->orderBy('intContractID', 'desc')
                    ->first();
                $contractID = $result->intContractID;
                
                $guards = DB::table('tblguardpendingnotification')
                    ->join('tblguard','tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
                    ->select('tblguard.intGuardID')
                    ->where('tblguardpendingnotification.intClientPendingID', $clientPendingID)
                    ->where('tblguardpendingnotification.intStatusIdentifier', 2)
                    ->get();


                DB::table('tblclientpendingnotification')
                    ->where('intClientPendingID', $clientPendingID)
                    ->update([
                        'intStatusIdentifier' => 0 //accepted
                    ]);

                $adminAccountID = $request->session()->get('accountID');

                foreach($guards as $value){
                    $guardID = $value->intGuardID;
                    $guardMessage = 'You are now assigned to ' . $clientName . '. Please contact the client for more info.';
                    $messageSubject = 'Additional Guard Update';
                    $result = DB::table('tblguard')
                        ->select('intAccountID')
                        ->where('intGuardID', $guardID)
                        ->first();
                    $guardAccountID = $result->intAccountID;

                    //message of guards
                    DB::table('tblinbox')->insert([
                        'intAccountIDSender' => $adminAccountID,
                        'intAccountIDReceiver' => $guardAccountID,
                        'strMessage' => $guardMessage,
                        'strSubject' => $messageSubject,
                        'tinyintType' => 0
                    ]);
                    //message of guards

                    //guard status
                    DB::table('tblguardstatus')->insert([
                        'intGuardID' => $guardID,
                        'intStatusIdentifier' => 2,
                        'dateEffectivity' =>$now
                    ]);
                    //guard status

                    //client guard 
                    DB::table('tblclientguard')->insert([
                        'intGuardID' => $guardID,
                        'intContractID' => $contractID,
                        'boolStatus' => 1,
                        'created_at' => $now
                    ]);
                    //client guard
                }//foreach

                DB::commit();
            }catch(Exception $e){
                DB::rollback();
            }
            
        }//if else
    }//function proceed
}
