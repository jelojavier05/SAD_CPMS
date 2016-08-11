<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class InboxController extends Controller
{
    public function getInbox(Request $request){
        $accountID = $request->session()->get('accountID');
        
        $messages = DB::table('tblinbox')
            ->select('*')
            ->where('intAccountIDReceiver', $accountID)
            ->orderBy('datetimeSend', 'desc')
            ->get();
        
        foreach($messages as $value){
            $value->datetimeSend = date('M-d-Y h:i A', strtotime($value->datetimeSend)); 
            $accountType = DB::table('tblaccount')
                ->select('intAccountType')
                ->where('intAccountID',$value->intAccountIDSender)
                ->first();
            $accountType = $accountType->intAccountType;
            if ($accountType == 0 || $accountType == 1){
                $client = DB::table('tblclient')
                    ->select('strClientName')
                    ->where('intAccountID', $value->intAccountIDSender)
                    ->first();
                $nameSender = $client->strClientName;
            }else if ($accountType == 2){
                $guard = DB::table('tblguard')
                    ->select('strFirstName', 'strLastName')
                    ->where('intAccountID', $value->intAccountIDSender)
                    ->first();
                $nameSender = $guard->strFirstName . ' ' . $guard->strLastName;
            }else if ($accountType == 3){
                $nameSender = 'Admin';
            }
            
            $value->nameSender = $nameSender;
        }
        
        return response()->json($messages);
    }

    public function readInbox(Request $request){
        DB::table('tblinbox')
            ->where('intInboxID', $request->inboxID)
            ->update(['tinyintStatus' => 0]);
    }

    public function getNumberOfUnreadMessages(Request $request){
        $accountID = $request->session()->get('accountID');

        $numberOfUnreadMessages = DB::table('tblinbox')
            ->where('intAccountIDReceiver',$accountID)
            ->where('tinyintStatus', 1)
            ->count();
        return response()->json($numberOfUnreadMessages);
    }
}
