<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;


class ClientContractController extends Controller
{
    
    public function index(){
        $contract = DB::table('tbltypeofcontract')
            ->select('*')
            ->where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        return view('/clientAdmin/clientContract')
            ->with('contract', $contract); 
    }
    
    public function getGuardAccepted(Request $request){
        if ($request->session()->has('contractClientID')){
            $id = $request->session()->get('contractClientID');
            $guards = DB::table('tblclient')
                ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
                ->join('tblguardpendingnotification', 'tblguardpendingnotification.intClientPendingID', '=', 'tblclientpendingnotification.intClientPendingID')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
                ->select('tblguard.strFirstName', 'tblguard.strLastName')
                ->where('tblclient.intClientID', '=', $id)
                ->where('tblguardpendingnotification.intStatusIdentifier', '=', 3)
                ->get();
           

            if (is_null($guards)){
                return response()->json(false);
            }else{
                return response()->json($guards);    
            }
//            return response()->json($id);
        }
    }
    
    public function getGunTagged(Request $request){
        $gunTagged = $request->session()->get('gunTagged');
        
        return response()->json($gunTagged);
    }
}