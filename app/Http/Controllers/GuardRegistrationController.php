<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ArmedService;
use App\Model\GovernmentExam;
use App\Model\Requirements;
use App\Model\BodyAttribute;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon;
class GuardRegistrationController extends Controller
{
	
    public function personalDataBC(Request $request){
        $bodyAttributes = BodyAttribute::
                where('deleted_at', null)
                    ->where('boolFlag', 1)
                    ->get();
        
        if ($request->session()->has('personalDataSession')) {
            
            $firstName = $request->session()->get('firstName');
            $middleName = $request->session()->get('middleName');
            $lastName = $request->session()->get('lastName');
            $address = $request->session()->get('address');
            $dateOfbirth = $request->session()->get('dateOfbirth');
            $contactCp = $request->session()->get('contactCp');
            $contactLandline = $request->session()->get('contactLandline');
            $civilStatus = $request->session()->get('civilStatus');
            $gender = $request->session()->get('gender');

            $data = collect(['firstName' => $firstName,
                             'middleName' => $middleName,
                             'lastName' => $lastName,
                             'address' => $address,
                             'dateOfbirth' => $dateOfbirth,
                             'contactCp' => $contactCp,
                             'contactLandline' => $contactLandline,
                             'civilStatus' => $civilStatus,
                             'gender' => $gender]);
            
            return view ('/guardAdmin/personalData')
                ->with ('bodyAttributes', $bodyAttributes)
                ->with ('data', $data);
            
        }else{
             return view ('/guardAdmin/personalData')
                ->with ('bodyAttributes', $bodyAttributes);
        }
    }
    
    public function educationalBackgroundBC(Request $request){
        if ($request->session()->get('personalDataSession') == 'active') {
            
            return view ('/guardAdmin/educbackGround');    
        }else{
            return view ('/guardAdmin/educbackGround');
        }
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
    
    public function licenseBC(){
        return view('/guardAdmin/sgLicense');
    }
    
    public function accountBC(){
        return view('/guardAdmin/accountForm');
    }
    
    public function personalDataSession(Request $request){
        
        $request->session()->put('personalDataSession', 'active');
        
        $request->session()->put('firstName', $request->strFirstName);
        $request->session()->put('middleName', $request->strMiddleName);
        $request->session()->put('lastName', $request->strLastName);
        $request->session()->put('address', $request->strAddress);
        $request->session()->put('dateOfbirth', $request->dateBirth);
        $request->session()->put('contactCp', $request->strMobileNumber);
        $request->session()->put('contactLandline', $request->strLandlineNumber);
        $request->session()->put('civilStatus', $request->strCivilStatus);
        $request->session()->put('gender', $request->strGender);
    }
    
    public function educationalBackgroundSession(Request $request){
        $request->session()->put('educationalBackgroundSession', 'active');
        
        $request->session()->put('schoolNamePrimary', $request->schoolNamePrimary);
        $request->session()->put('fromPrimary', $request->fromPrimary);
        $request->session()->put('toPrimary', $request->toPrimary);
        $request->session()->put('schoolNameSecondary', $request->schoolNameSecondary);
        $request->session()->put('fromSecondary', $request->fromSecondary);
        $request->session()->put('toSecondary', $request->toSecondary);
        $request->session()->put('schoolNameTertiary', $request->schoolNameTertiary);
        $request->session()->put('fromTertiary', $request->fromTertiary);
        $request->session()->put('toTertiary', $request->toTertiary);
    }
    
}
