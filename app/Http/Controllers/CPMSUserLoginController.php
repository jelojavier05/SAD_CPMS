<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;

class CPMSUserLoginController extends Controller
{     
    public function index(Request $request){
       // $request->session()->flush();
        if ($request->session()->has('accountType')){
            $accountType = $request->session()->get('accountType');
            if ($accountType == 0){
                return redirect('/client/tempaccount');
            }else if ($accountType == 1){
                return redirect('/clienthomepage');
            }else if ($accountType == 2){
                return redirect('/securityHome');
            }else if ($accountType == 3){
                return redirect('/dashboardadmin');
            }
        }else{
            return view('/CPMSUserLogin');    
        }
        
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
            $request->session()->put('accountID', $account->intAccountID);
            if ($account->intAccountType == 0 || $account->intAccountType == 1){//temporary account
                
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
            }else if ($account->intAccountType == 3){//admin account
                
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
