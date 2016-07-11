<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class GuardViewController extends Controller
{
    
    public function index(){
    
//        return view('/clientGuardTagging');
        return view('/guardView');
//        return view('/clientContract'); 
    }
}