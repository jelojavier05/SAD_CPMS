<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ClientSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
    	$clientID = $request->session()->get('id');

    	$clientInformation = DB::table('tblclient')
    		->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
    		->select('tblclient.*', 'tblclientaddress.strAddress')
    		->where('tblclient.intClientID', $clientID)
    		->first();
    	
        return view('/client/ClientSettings')
        	->with('client', $clientInformation);
    }

    public function update(Request $request){
    	$clientID = $request->session()->get('id');
    	try{
    		DB::beginTransaction();

    		DB::table('tblclient')
	    		->where('intClientID', $clientID)
	    		->update([
					'strClientName' => $request->strClientName,
					'strPersonInCharge' =>$request->strPersonInCharge,
					'strPOICContactNumber' =>$request->strPOICContactNumber,
					'deciAreaSize' =>$request->deciAreaSize,
					'strContactNumber' =>$request->strContactNumber,
					'intPopulation' =>$request->intPopulation
				]);

			DB::table('tblclientaddress')
				->where('intClientID', $clientID)
				->update([
					'strAddress' =>$request->strAddress
				]);
    		DB::commit();
    	}catch(Exception $e){
    		DB::rollback();
    	}
	    	
    }
}
