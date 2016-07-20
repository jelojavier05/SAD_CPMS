<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;

class CPMSUserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('/CPMSUserLogin');
    }

    public function getAccount(Request $request){
        $username = Input::get('username');
        $password = Input::get('password');
        
        $account = DB::table('tblaccount')
            ->select('intAccountID', 'strUsername', 'strPassword', 'intAccountType')
            ->where('strUsername', '=', $username)
            ->where('strPassword', '=', $password)
            ->first();
        
        if (is_null($account)){
            return response()->json(false);
        }else{
            
            if ($account->intAccountType == 0){//temporary account
                
                $clientID = DB::table('tblclient')
                    ->select('intClientID')
                    ->where('intAccountID', '=', $account->intAccountID)
                    ->first();
                
                $request->session()->put('id', $clientID->intClientID);
            }
            
            else if ($account->intAccountType == 2){//guard account
                
                $guardID = DB::table('tblguard')
                    ->select('intGuardID')
                    ->where('intAccountID', '=', $account->intAccountID)
                    ->first();
                
                $request->session()->put('id', $guardID->intGuardID);
            }
            $request->session()->put('accountType', $account->intAccountType);
            return response()->json($account);
        }
        
        
    }
    
    public function logoutAccount(Request $request){
        $request->session()->flush();
        return response()->json(false);
    }
}
