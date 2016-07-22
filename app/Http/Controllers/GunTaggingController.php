<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class GunTaggingController extends Controller
{
    public function index(){
        return view('/clientAdmin/clientGunTagging');
    }
    
    public function post(Request $request){
        $gunTagged = array();
        $arrType = $request->type;
        $arrGunID = $request->gunID;
        $arrRounds = $request->rounds;
        
        for ($intLoop = 0; $intLoop < count($arrType); $intLoop ++){
            $value = new \stdClass();
            $value->type = $arrType[$intLoop];
            $value->gunID = $arrGunID[$intLoop];
            $value->rounds = $arrRounds[$intLoop];
            array_push($gunTagged, $value);
        }   
        
        $request->session()->put('gunTagged', $gunTagged);
    }
}