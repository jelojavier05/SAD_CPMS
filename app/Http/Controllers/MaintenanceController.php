<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MaintenanceController extends Controller
{
    public function insert(Request $request){
        $result = DB::table('tblaccount')
            ->select('intAccountID')
            ->where('intAccountType', 3)
            ->first();

        if (is_null($result)){
            try{
                DB::beginTransaction();
                    DB::table('tblaccount')->insert([
                    'strUsername' => 'admin',
                    'strPassword' => 'admin', 
                    'intAccountType' => 3
                ]);       

                DB::table('tblnatureofbusiness')->insert([
                    ['strNatureOfBusiness' => 'Bank', 'deciRate' => 50],
                    ['strNatureOfBusiness' => 'University', 'deciRate' => 45]
                ]);  

                DB::table('tbltypeofcontract')->insert([
                    ['strTypeOfContractName' => 'Yearly', 'strDescription' => '1 Year','intMonthDuration' => 12],
                    ['strTypeOfContractName' => 'Half Year', 'strDescription' => '6 months','intMonthDuration' => 6],
                ]);

                DB::table('tblarmedservice')->insert([
                    ['strArmedServiceName' => 'ROTC'],
                    ['strArmedServiceName' => 'Military']
                ]);

                DB::table('tblmeasurement')->insert([
                    ['strMeasurement' => 'ft'],
                    ['strMeasurement' => 'kg']
                ]);

                DB::table('tblbodyattribute')->insert([
                    ['intMeasurementID' => 1, 'strBodyAttributeName' => 'Height'],
                    ['intMeasurementID' => 2, 'strBodyAttributeName' => 'Weight']
                ]);

                DB::table('tblgovernmentexam')->insert([
                    ['strGovernmentExam' => 'Pen-and-Paper Test'],
                    ['strGovernmentExam' => 'Civil Service Exam']
                ]);

                DB::table('tblleave')->insert([
                    ['strLeaveType' => 'Vacation', 'intLeaveCount' => '15', 'intNotificationPeriod' => '7'],
                    ['strLeaveType' => 'Sick', 'intLeaveCount' => '15', 'intNotificationPeriod' => '1']
                ]);

                DB::table('tblrank')->insert([
                    ['strRank' => 'Reserved Military', 'intArmedServiceID' => 2],
                    ['strRank' => 'Private Class', 'intArmedServiceID' => 2],
                    ['strRank' => '1st Lt.', 'intArmedServiceID' => 1],
                    ['strRank' => '2nd Lt.', 'intArmedServiceID' => 1],
                ]);

                DB::table('tblprovince')->insert([
                    ['strProvinceName' => 'Metro Manila'],
                    ['strProvinceName' => 'Rizal']
                ]);

                DB::table('tblcity')->insert([
                    ['intProvinceID' => 1, 'strCityName' => 'Manila'],
                    ['intProvinceID' => 1, 'strCityName' => 'Pasig'],
                    ['intProvinceID' => 2, 'strCityName' => 'Angono'],
                    ['intProvinceID' => 2, 'strCityName' => 'Binangonan'],
                ]);            

                DB::table('tblrequirements')->insert([
                    ['strRequirements' => 'Birth Certificate', 'strDescription' => 'NSO', 'intIdentifier' => '2'],
                    ['strRequirements' => 'Medical Certificate', 'strDescription' => 'X-Ray', 'intIdentifier' => '2'],
                    ['strRequirements' => 'Security Guard License', 'strDescription' => 'Updated', 'intIdentifier' => '2'],
                ]);

                DB::table('tbltypeofgun')->insert([
                    ['strTypeOfGun' => 'Pistol', 'strDescription' => 'Handgun'],
                    ['strTypeOfGun' => 'Rifle', 'strDescription' => 'Rifle guns'],
                ]);
                DB::commit();
            }catch(Exception $e){
                DB::rollback();
            }
                
        }

        return redirect('/userlogin');
    }
}
    