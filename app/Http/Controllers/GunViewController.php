<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Input;

class GunViewController extends Controller{
    
    public function index(){
        $gunType = DB::table('tbltypeofgun')
            ->select('*')
            ->whereNull('deleted_at')
            ->where('boolFlag', 1)
            ->orderBy('strTypeOfGun','asc')
            ->get();
        return view('GunAdmin.gunView')
            ->with('gunType',$gunType);
    }
    
    public function getGuns(){
        $guns = DB::table('tblgun')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=' ,'tblgun.intTypeOfGunID')
            ->join('tblgunlicense', 'tblgunlicense.intGunID', '=', 'tblgun.intGunID')
            ->select('tblgun.strGunName', 'tblgun.boolFlag', 'tblgun.intGunID', 'tbltypeofgun.strTypeOfGun', 'tblgunlicense.strLicenseNumber', 'tblgunlicense.dateExpiration')
            ->where('tblgun.deleted_at', '=' ,null)
            ->get();
        
        return response()->json($guns);
    }
    
    public function getGun(){
        $gunID = Input::get('gunID');
        
        $guns = DB::table('tblgun')
            ->join('tblgunlicense', 'tblgunlicense.intGunID', '=', 'tblgun.intGunID')
            ->select('tblgun.*','tblgunlicense.strLicenseNumber', 'tblgunlicense.dateExpiration', 'tblgunlicense.dateIssued')
            ->where('tblgun.intGunID', '=' ,$gunID)
            ->first();
        
        return response()->json($guns);
    }

    public function update(Request $request){
        $gunID = $request->intGunID;
        DB::table('tblgun')
            ->where('intGunID', $gunID)
            ->update([
                'strGunName' => $request->strGunName,
                'strMaker' =>$request->strMaker,
                'strSerialNumber' => $request->strSerialNumber,
                'intTypeOfGunID' => $request->intTypeOfGunID
            ]);

        DB::table('tblgunlicense')
            ->where('intGunID', $gunID)
            ->update([
                'strLicenseNumber' => $request->strLicenseNumber
            ]);
    }
}