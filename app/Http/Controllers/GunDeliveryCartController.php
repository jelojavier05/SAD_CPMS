<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;

class GunDeliveryCartController extends Controller
{
    
    public function index(){
        $orderHeader = DB::table('tblgunorderheader')
            ->join('tblclient', 'tblclient.intClientID', 'tblgunorderheader.intClientID')
            ->
            
        
        return view('GunAdmin.gunDeliveryCart');
    }
}