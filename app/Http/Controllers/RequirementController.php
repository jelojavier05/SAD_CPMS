<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Requirements;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $requirements = Requirements::
            where('deleted_at', null)
            ->where('boolFlag', 1)
            ->where('intIdentifier','>=', 2)
            ->get();
        
        return view('/guardAdmin/requirement')
            ->with ('requirements', $requirements);
    }
    
    public function get(Request $request){
        
        if ($request->session()->has('requirement')) {
            $requirement = new \stdClass();
            $requirement = $request->session()->get('requirement');
            return response()->json($requirement);
        }else{
            return response()->json(false);
        }
    }
    
    public function post(Request $request){
        $request->session()->put('requirement', $request->requirement);
        
        $requirement = $request->requirement;
        $array = array();
        for ($intLoop = 0; $intLoop < count($requirement); $intLoop ++){
            $value = new \stdClass();
            $value->id = $requirement[$intLoop];
            
            array_push($array,$value);
        }
        
        $request->session()->put('requirementDB', $array);
    }

}
