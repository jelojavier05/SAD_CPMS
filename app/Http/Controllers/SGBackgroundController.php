<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ArmedService;
use App\Model\GovernmentExam;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SGBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $armedservices = ArmedService::
            where('deleted_at', null)
            ->where('boolFlag', 1)
            ->orderBy('strArmedServiceName', 'asc')
            ->get();
        
        $governmentExams = GovernmentExam::
            where('deleted_at', null)
            ->where('boolFlag', 1)
            ->orderBy('strGovernmentExam', 'asc')
            ->get();
        
        return view ('/guardAdmin/sgBackground')
            ->with ('armedservices', $armedservices)
            ->with ('governmentExams', $governmentExams);
    }
    
    public function getArmedService(Request $request){
        if ($request->session()->has('armedService')) {
            $armedService = new \stdClass();
            $armedService = $request->session()->get('armedService');
            return response()->json($armedService);
        }else{
            return response()->json(false);
        }
    }
    
    public function getGovernmentExam(Request $request){
        if ($request->session()->has('governmentExam')) {
            $governmentExam = new \stdClass();
            $governmentExam = $request->session()->get('governmentExam');
            return response()->json($governmentExam);
        }else{
            return response()->json(false);
        }
    }
    
    public function post(Request $request){
        $request->session()->put('armedService', $request->armedService);
        $request->session()->put('governmentExam', $request->governmentExam);
    }

}
