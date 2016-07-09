<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BodyAttribute;
use App\Model\Province;
use App\Model\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalDataController extends Controller
{
    
    public function index(Request $request)
    {
        $bodyAttributes = BodyAttribute::
                where('deleted_at', null)
                    ->where('boolFlag', 1)
                    ->get();
        
        $provinces = Province::
            where('deleted_at', null)
                ->where('boolFlag',1)
                ->get();
        $counter = BodyAttribute::count();
        
        return view ('/guardAdmin/personaldata')
                ->with ('bodyAttributes', $bodyAttributes)
                ->with('provinces', $provinces)
                ->with('counter', $counter);
    }
    
    public function get(Request $request){
        //$request->session()->forget('personalData');
        
        if ($request->session()->has('personalData')) {
            $personalData = new \stdClass();
            $personalData = $request->session()->get('personalData');
            return response()->json($personalData);
        }else{
            
            return response()->json(false);
        }
        
    }
    
    public function post(Request $request){
        $bodyAttributes = array(); 
        
        $arrBodyAttributeID = $request->bodyAttributeID;
        $arrValue = $request->value;
        
        for ($intLoop = 0; $intLoop < count($arrBodyAttributeID); $intLoop ++){
            $value = new \stdClass();
            $value->intBodyAttributeID = $arrBodyAttributeID[$intLoop];
            $value->strValue = $arrValue[$intLoop];
            array_push($bodyAttributes, $value);
        }   
        
        $license = new \stdClass();
        $license->licenseNumber = $request->licenseNumber;
        $license->dateIssued = $request->dateIssued;
        $license->dateExpiration = $request->dateExpiration;
        
        $personalData = new \stdClass();

        $personalData->firstName = $request->strFirstName;
        $personalData->middleName = $request->strMiddleName;
        $personalData->lastName = $request->strLastName;
        $personalData->address = $request->strAddress;
        $personalData->dateOfbirth = $request->dateBirth;
        $personalData->placeofbirth = $request->placeofbirth;
        $personalData->contactCp = $request->strMobileNumber;
        $personalData->contactLandline = $request->strLandlineNumber;
        $personalData->civilStatus = $request->strCivilStatus;
        $personalData->gender = $request->strGender;
        $personalData->bodyAttribute = $bodyAttributes;
        $personalData->province = $request->province;
        $personalData->city = $request->city;
        $personalData->license = $license;
        $personalData->flag = 'active';
        
        $request->session()->put('personalData', $personalData);
        
    }
}
