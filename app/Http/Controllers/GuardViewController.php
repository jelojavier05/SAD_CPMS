<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Guard;
use App\Model\BodyAttribute;
use App\Model\GovernmentExam;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use DB;

class GuardViewController extends Controller
{
    
    public function index(){
    
        $guards = Guard::where('deleted_at', null)
            ->get();
        
        $bodyAttributes = BodyAttribute::where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        $governmentExams = GovernmentExam::where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
            
        
        return view('adminList.guardView')
            ->with('guards', $guards)
            ->with('bodyAttributes', $bodyAttributes)
            ->with('governmentExams', $governmentExams);
    }
    
    public function getInformationGuard(){
        $guardID = Input::get('guardID');
        
        $guard = Guard::where('intGuardID', $guardID)
            ->first();
        
        $licenseNumber = DB::table('tblguardlicense')
            ->select('strLicenseNumber')
            ->where('intGuardID', $guardID)
            ->first();
        
        $address = DB::table('tblguard')
            ->join('tblguardaddress', 'tblguard.intGuardID', '=', 'tblguardaddress.intGuardID')
            ->join('tblprovince', 'tblguardaddress.intProvinceID', '=', 'tblprovince.intProvinceID')
            ->join('tblcity', 'tblguardaddress.intCityID', '=', 'tblcity.intCityID')
            ->select('tblguard.intGuardID', 'tblguardaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName')->where('tblguard.intGuardID', '=', $guardID)
            ->first();
        
        $bodyAttributes = DB::table('tblguard')
            ->join('tblguardbodyattribute', 'tblguard.intGuardID', '=', 'tblguardbodyattribute.intGuardID')
            ->join('tblbodyattribute', 'tblguardbodyattribute.intBodyAttributeID', '=', 'tblbodyattribute.intBodyAttributeID')
            ->join('tblmeasurement', 'tblbodyattribute.intMeasurementID', '=', 'tblmeasurement.intMeasurementID')
            ->select('tblbodyattribute.strBodyAttributeName', 'tblmeasurement.strMeasurement', 'tblguardbodyattribute.strValue', 'tblbodyattribute.intBodyAttributeID')->where('tblguard.intGuardID', '=', $guardID)
            ->get();
        
        $armedService = DB::table('tblguard')
            ->join('tblguardarmedservice', 'tblguard.intGuardID', '=', 'tblguardarmedservice.intGuardID')
            ->join('tblarmedservice', 'tblguardarmedservice.intArmedServiceID', '=', 'tblarmedservice.intArmedServiceID')
            ->join('tblrank', 'tblguardarmedservice.intRankID', '=', 'tblrank.intRankID')
            ->select('tblarmedservice.strArmedServiceName', 'tblrank.strRank')->where('tblguard.intGuardID', '=', $guardID)
            ->first();
        
        $governmentExam = DB::table('tblguard')
            ->join('tblguardgovernmentexam', 'tblguard.intGuardID', '=', 'tblguardgovernmentexam.intGuardID')
            ->join('tblgovernmentexam', 'tblgovernmentexam.intGovernmentExamID', '=', 'tblguardgovernmentexam.intGovernmentExamID')
            ->select('tblguardgovernmentexam.strRating', 'tblgovernmentexam.strGovernmentExam', 'tblgovernmentexam.intGovernmentExamID')->where('tblguard.intGuardID', '=', $guardID)
            ->get();
        
        $guard->licenseNumber = $licenseNumber;
        $guard->address = $address;
        $guard->bodyAttribute = $bodyAttributes;
        $guard->armedService = $armedService;
        $guard->governmentExam = $governmentExam;
        
        
        return response()->json($guard);
    }
}