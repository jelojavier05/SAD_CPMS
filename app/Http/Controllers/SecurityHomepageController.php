<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SecurityHomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       return view('securityguard.SecurityHomepage');
    }
    
    public function getGuardInformation(Request $request){
        if ($request->session()->has('id')){
            $id = $request->session()->get('id');
            
            $guard = DB::table('tblguard')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblguardlicense.strLicenseNumber')
                ->where('tblguard.intGuardID', '=', $id)
                ->first();
            
            return response()->json($guard);
        }else{
            return false;
        }
    }//getGuardInformation
}
