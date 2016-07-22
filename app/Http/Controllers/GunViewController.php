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
        return view('GunAdmin.gunView');
    }
    
    public function getGuns(){
        $guns = DB::table('tblgun')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=' ,'tblgun.intTypeOfGunID')
            ->select('tblgun.strGunName', 'tblgun.boolFlag', 'tblgun.intGunID', 'tbltypeofgun.strTypeOfGun')
            ->where('tblgun.deleted_at', '=' ,null)
            ->get();
        
        return response()->json($guns);
    }
    
    public function getGun(){
        $gunID = Input::get('gunID');
        
        $guns = DB::table('tblgun')
            ->join('tblgunlicense', 'tblgunlicense.intGunID', '=', 'tblgun.intGunID')
            ->select('tblgun.strMaker','tblgun.strSerialNumber','tblgunlicense.strLicenseNumber', 'tblgunlicense.dateIssued', 'tblgunlicense.dateExpiration')
            ->where('tblgun.intGunID', '=' ,$gunID)
            ->first();
        
        return response()->json($guns);
    }
}