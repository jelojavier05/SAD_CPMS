<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;


class TempClientDetailsController extends Controller
{
    
    public function index(){
        return view('/tempClientDetails');
    }
    
    public function update(Request $request){
        $id = $request->session()->get('id');
        
        DB::table('tblclient')
            ->where('intClientID', $id)
            ->update([
                'strContactNumber' => $request->clientNumber,
                'strPersonInCharge' => $request->personInCharge,
                'strPOICContactNumber' => $request->personNumber,
                'deciAreaSize' => $request->areaSize,
                'intPopulation' => $request->population
            ]);
    }
}