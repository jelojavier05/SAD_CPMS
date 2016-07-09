<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ArmedService;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalDataController extends Controller
{
    
    public function index()
    {
        return view('/guardAdmin/personalData2');
    }
    
    public function get(Request $request){
        //$request->session()->flush();
        $request->session()->put('personalData', 'active');
        
        if ($request->session()->has('personalData')) {
//            $personalData = new \stdClass();
//            
//            $personalData->firstName = $request->session()->get('firstName');
//            $personalData->middleName = $request->session()->get('middleName');
//            $personalData->lastName = $request->session()->get('lastName');
//            $personalData->address = $request->session()->get('address');
//            $personalData->dateOfbirth = $request->session()->get('dateOfbirth');
//            $personalData->placeofbirth = $request->session()->get('placeofbirth');
//            $personalData->contactCp = $request->session()->get('contactCp');
//            $personalData->contactLandline = $request->session()->get('contactLandline');
//            $personalData->civilStatus = $request->session()->get('civilStatus');
//            $personalData->gender = $request->session()->get('gender');
//            $personalData->bodyAttributeValue = $request->session()->get('bodyAttributeValue');
//            $personalData->province = $request->session()->get('province');
//            $personalData->city = $request->session()->get('city');
            $personalData = $request->session()->get('personalData');
        }else{
            $personalData = false;
        }
        return response()->json($personalData);
    }
    
    public function post(Request $request){
        $array = array(); 
        
        $arrBodyAttributeID = $request->bodyAttributeID;
        $arrValue = $request->value;
        $arrBodyAttribute = $request->bodyAttribute;
        
        for ($intLoop = 0; $intLoop < count($arrBodyAttributeID); $intLoop ++){
            $value = new \stdClass();
            $value->intBodyAttributeID = $arrBodyAttributeID[$intLoop];
            $value->strValue = $arrValue[$intLoop];
            $value->strBodyAttribute = $arrBodyAttribute[$intLoop];
            
            array_push($array, $value);
        }   
        
        $personalData = new \stdClass();

        $personalData->firstName = $request->strFirstName;
        $personalData->middleName = $request->strFirstName;
        $personalData->lastName = $request->strMiddleName;
        $personalData->address = $request->strAddress;
        $personalData->dateOfbirth = $request->dateBirth;
        $personalData->placeofbirth = $request->placeofbirth;
        $personalData->contactCp = $request->strMobileNumber;
        $personalData->contactLandline = $request->strLandlineNumber;
        $personalData->civilStatus = $request->strCivilStatus;
        $personalData->gender = $request->strGender;
        $personalData->bodyAttributeValue = $request->strFirstName;
        $personalData->province = $request->strFirstName;
        $personalData->city = $request->strFirstName;
        
        $request->session()->put('personalDataSession', 'active');
        $request->session()->put('firstName', $request->strFirstName);
        $request->session()->put('middleName', $request->strMiddleName);
        $request->session()->put('lastName', $request->strLastName);
        $request->session()->put('address', $request->strAddress);
        $request->session()->put('dateOfbirth', $request->dateBirth);
        $request->session()->put('placeofbirth', $request->placeofbirth);
        $request->session()->put('contactCp', $request->strMobileNumber);
        $request->session()->put('contactLandline', $request->strLandlineNumber);
        $request->session()->put('civilStatus', $request->strCivilStatus);
        $request->session()->put('gender', $request->strGender);
        $request->session()->put('bodyAttributeValue', $array);
        $request->session()->put('province', $request->province);
        $request->session()->put('city', $request->city);
    }
}
