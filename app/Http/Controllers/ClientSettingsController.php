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

    public function updateMacAddress(Request $request){
    	$clientID = $request->session()->get('id');

    	ob_start(); // Turn on output buffering
        system('ipconfig /all'); //Execute external program to display output
        $mycom=ob_get_contents(); // Capture the output into a variable
        ob_clean(); // Clean (erase) the output buffer

        $findme ='Physical';
        $pmac = strpos($mycom, $findme); // Find the position of Physical text
        $mac=substr($mycom,($pmac+36),17); // Get Physical Address

        DB::table('tblcgrm')
        	->where('intClientID', $clientID)
        	->update([
        		'strMacAddress' => $mac
        	]);
    }
}
