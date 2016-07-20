<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;

class TempClientAccountController extends Controller
{
    
    public function index(){
        
        if ($request->session()->has('accountType') && $request->session()->get('accountType') == 0){
            
        }else{
            
        }
        
        
        return view('/tempClientAccount');
    }
    
}