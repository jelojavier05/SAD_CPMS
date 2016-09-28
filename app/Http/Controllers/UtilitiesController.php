<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class UtilitiesController extends Controller
{
    public function getUtilities(){
        $utilities = DB::table('tblutilities')
            ->select('*')
            ->first();

        return response()->json($utilities);
    }

    public function update(Request $request){
    	$strCompanyName = $request->strCompanyName;
    	$strAdminName = $request->strAdminName;
    	$strAddress = $request->strAddress;
    	$strContactNumber = $request->strContactNumber;
    	$strUsername = $request->strUsername;
    	$strPassword = $request->strPassword;

    	try{
    		DB::beginTransaction();

    		DB::table('tblutilities')
    			->update([
    				'strAdminName' => $strAdminName,
    				'strCompanyName' => $strCompanyName,
    				'strContactNumber' => $strContactNumber,
    				'strAddress' => $strAddress
    			]);

    		DB::table('tblaccount')
    			->where('intAccountType', 3)
    			->update([
    				'strUsername' => $strUsername,
    				'strPassword' => $strPassword
    			]);
    		DB::commit();
    	}catch(Exception $e){
    		DB::rollback();
    	}
    }
}
