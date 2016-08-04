<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;

class AdminInboxController extends Controller
{
   
    public function index(){
        return view('/adminInbox');
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
}