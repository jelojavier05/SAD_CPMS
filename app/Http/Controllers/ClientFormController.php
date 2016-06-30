<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class ClientFormController extends Controller
{
    
    
    
    public function basicInfoBC(){
        return view('clientAdmin/clientForm');
    }
    
    public function contractInfoBC(){
        return view('clientAdmin/clientContract');
    }
    
    public function guardDeploymentBC(){
        return view('clientAdmin/clientGuardTagging');
    }
    
    public function gunTaggingBC(){
        return view('/clientAdmin/clientGunTagging');
    }
}