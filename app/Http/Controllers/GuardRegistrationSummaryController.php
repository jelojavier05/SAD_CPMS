<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BodyAttribute;
use App\Model\GovernmentExam;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class GuardRegistrationSummaryController extends Controller
{
    public function index(){
        $bodyAttributes = BodyAttribute::
            where('deleted_at', null)
                ->where('boolFlag', 1)
                ->get();
        
        $governmentExams = GovernmentExam::
            where('deleted_at', null)
            ->where('boolFlag', 1)
            ->orderBy('strGovernmentExam', 'asc')
            ->get();

        return view('/guardAdmin/guardSummary')
            ->with('bodyAttributes', $bodyAttributes)
            ->with ('governmentExams', $governmentExams);
    }
    
    public function insert(Request $request){
        try{
            DB::beginTransaction();
            
            $account = $request->session()->get('accountDB');
            $accountID = DB::table('tblaccount')->insertGetId([
                'strUsername' => $account->username,
                'strPassword' => $account->password,
                'intAccountType' => 2
            ]);
            
            $personalData = $request->session()->get('personalData');
            $id = DB::table('tblguard')->insertGetId([
                'strFirstName' => $personalData->firstName, 
                'strMiddleName' => $personalData->middleName,
                'strLastName' => $personalData->lastName,
                'dateBirthday' => $personalData->dateOfbirth,
                'strPlaceBirth' => $personalData->placeofbirth,
                'strContactNumberMobile' => $personalData->contactCp,
                'strContactNumberLandline' => $personalData->contactLandline,
                'strCivilStatus' => $personalData->civilStatus,
                'strGender' => $personalData->gender,
                'intAccountID' => $accountID,
                'intStatusIdentifier' => 0
            ]);
            
            $educationalBackground = $request->session()->get('educationalBackgroundDB');
            foreach ($educationalBackground as $value) {
                DB::table('tblguardeducation')->insert([
                    'intGuardID' => $id, 
                    'strEducationIdentifier' => $value->type,
                    'strSchoolName' => $value->school,
                    'intYearFrom' => $value->yearFrom,
                    'intYearTo' => $value->yearTo,
                ]);
            }

            $license = $personalData->license;
            DB::table('tblguardlicense')->insert([
                'intGuardID' => $id, 
                'strLicenseNumber' => $license->licenseNumber,
                'dateIssued' => $license->dateIssued,
                'dateExpiration' => $license->dateExpiration
            ]);
            
            DB::table('tblguardaddress')->insert([
                'intGuardID' => $id, 
                'strAddress' => $personalData->address,
                'intProvinceID' => $personalData->provinceID,
                'intCityID' => $personalData->cityID
            ]);
            
            
            $bodyAttributeValues = $personalData->bodyAttribute;
            foreach ($bodyAttributeValues as $value) {
                DB::table('tblguardbodyattribute')->insert([
                    'intGuardID' => $id, 
                    'intBodyAttributeID' => $value->intBodyAttributeID,
                    'strValue' => $value->strValue
                ]);
            }
            
            $armedService = $request->session()->get('armedServiceDB');
            DB::table('tblguardarmedservice')->insert([
                'intGuardID' => $id, 
                'intArmedServiceID' => $armedService->id,
                'intRankID' => $armedService->rank,
                'intYear' => $armedService->year,
                'strDischarge' => $armedService->discharge,
                'strReason' => $armedService->reason
            ]);
            
            $governmentExam = $request->session()->get('governmentExamDB');
            foreach($governmentExam as $value){
                DB::table('tblguardgovernmentexam')->insert([
                    'intGuardID' => $id, 
                    'intGovernmentExamID' => $value->id,
                    'strRating' => $value->rating,
                    'dateTaken' => $value->dateTaken
                ]);
            }
            
            $requirements = $request->session()->get('requirementDB');
            foreach($requirements as $value){
                DB::table('tblguardrequirement')->insert([
                    'intGuardID' => $id, 
                    'intRequirementsID' => $value->id
                ]);    
            }
            
            $request->session()->forget('personalData');
            $request->session()->forget('educationalBackground');
            $request->session()->forget('educationalBackgroundDB');
            $request->session()->forget('armedService');
            $request->session()->forget('governmentExam');
            $request->session()->forget('armedServiceDB');
            $request->session()->forget('governmentExamDB');
            $request->session()->forget('requirement');
            $request->session()->forget('requirementDB');
            $request->session()->forget('account');
            $request->session()->forget('accountDB');
            
            DB::commit();
            
            
        }catch(Exception $e){
            DB::rollBack();
        }
    }

}
