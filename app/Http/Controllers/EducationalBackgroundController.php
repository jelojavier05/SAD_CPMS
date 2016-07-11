<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EducationalBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view ('/guardAdmin/educbackGround');
    }
    
    public function get(Request $request){
        
        if ($request->session()->has('educationalBackground')) {
            $educationalBackground = new \stdClass();
            $educationalBackground = $request->session()->get('educationalBackground');
            return response()->json($educationalBackground);
        }else{
            return response()->json(false);
        }
    }

    public function post(Request $request){        
        $request->session()->put('educationalBackground', $request->objSchool);
        
        $array = array();
        $type = $request->type;
        $school = $request->school;
        $yearFrom = $request->yearFrom;
        $yearTo = $request->yearTo;

        for ($intLoop = 0; $intLoop < count($type); $intLoop ++){
            $value = new \stdClass();
            $value->type = $type[$intLoop];
            $value->school = $school[$intLoop];
            $value->yearFrom = $yearFrom[$intLoop];
            $value->yearTo = $yearTo[$intLoop];

            array_push($array,$value);
        }
        
        $request->session()->put('educationalBackgroundDB', $array);
    }
}
