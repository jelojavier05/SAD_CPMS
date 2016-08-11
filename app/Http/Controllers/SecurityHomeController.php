<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SecurityHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

    	if ($request->session()->has('id')){
            $accountType = $request->session()->get('accountType');
            
            if ($accountType == 2){
                return view('securityguard.SecurityHome');
            }else{
                return redirect('/userlogin');
            }
        }else{
            return redirect('/userlogin');
        }
        
    }
}