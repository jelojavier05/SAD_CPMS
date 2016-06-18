<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ArmedService;
use App\Model\GovernmentExam;
use App\Model\Requirements;
use App\Model\BodyAttribute;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuardRegistrationController extends Controller
{
	
    public function personalDataBC(){
        $bodyAttributes = BodyAttribute::
                where('deleted_at', null)
                    ->where('boolFlag', 1)
                    ->get();
        
        return view ('/guardAdmin/personalData')
            ->with ('bodyAttributes', $bodyAttributes);
    }
    
    public function educationalBackgroundBC(){
        return view ('/guardAdmin/educbackGround');
    }
    
    public function sgBackgroundBC(){
        $armedservices = ArmedService::
            where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        $governmentExams = GovernmentExam::
            where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        return view ('/guardAdmin/sgBackground')
            ->with ('armedservices', $armedservices)
            ->with ('governmentExams', $governmentExams);
    }
    
    public function requirementBC(){
        $requirements = Requirements::
            where('deleted_at', null)
            ->where('boolFlag', 1)
            ->where('intIdentifier','>=', 2)
            ->get();
        
        return view('/guardAdmin/requirement')
            ->with ('requirements', $requirements);
    }
    
    public function accountBC(){
        return view('/guardAdmin/accountForm');
    }
    
    public function personalDataSession(Request $request){
        $request->session()->put('firstName', $request->firstName);
        
    }
    
}
