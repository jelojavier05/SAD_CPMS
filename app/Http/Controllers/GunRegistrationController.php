<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TypeOfGun;
use App\Model\Gun;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Carbon\Carbon;


class GunRegistrationController extends Controller
{
    
    public function index(){
        $typeOfGuns = TypeOfGun::where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        return view('GunAdmin.gunRegistration')
            ->with('typeOfGuns', $typeOfGuns);
    }
    
    public function insert(Request $request){
        try{
            DB::beginTransaction();
            $now = Carbon::now();
            $id = DB::table('tblgun')->insertGetId([
                'strSerialNumber' => $request->serialNumber, 
                'intTypeOfGunID' => $request->typeOfGun,
                'strMaker' => $request->manufacturer,
                'strGunName' => $request->name
            ]);
            
            DB::table('tblgunlicense')->insert([
                'intGunID' => $id,
                'strLicenseNumber' => $request->licenseNumber,
                'dateIssued' => $request->dateIssued,
                'dateExpiration' => $request->dateExpired
            ]);

            DB::table('tblgunstatus')->insert([
                'intGunID' => $id,
                'boolStatus' => 1,
                'dateEffectivity' => $now
            ]);
            
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
        }
    }
}