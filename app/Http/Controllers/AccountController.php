<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('/guardAdmin/accountForm');
    }

    public function get(Request $request){
        if ($request->session()->has('account')) {
            $account = new \stdClass();
            $account = $request->session()->get('account');
            return response()->json($account);
        }else{
            
            return response()->json(false);
        }
    }
    
    public function post(Request $request){
        $request->session()->put('account', $request->account);
        
        $value = new \stdClass();
        $value->username = $request->username;
        $value->password = $request->password;
        
        $request->session()->put('accountDB', $value);
    }
}
