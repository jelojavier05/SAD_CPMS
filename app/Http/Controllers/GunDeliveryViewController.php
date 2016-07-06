<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class GunDeliveryViewController extends Controller
{
    
    public function index(){
        return view('/gunDeliveryView');
 
    }
}