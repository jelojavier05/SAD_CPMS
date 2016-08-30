<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;

class AddRequestCompleteController extends Controller
{
    public function index(Request $request){

        if ($request->session()->has('additionalGuardID')){
            $clientPendingID = $request->session()->get('additionalGuardID');
            $requestInformation = DB::table('tblclientpendingnotification')
                ->join('tblinbox', 'tblinbox.intInboxID', '=', 'tblclientpendingnotification.intInboxID')
                ->select('tblinbox.strMessage', 'tblclientpendingnotification.intNumberOfGuard')
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
}
