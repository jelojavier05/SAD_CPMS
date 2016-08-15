<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class CGRGuardAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        return view('/CGR/CGRGuardAttendance');
    }

    public function getActiveGuard(Request $request){
    	$cgrmID = $request->session()->get('id');
    	$now = Carbon::now();

    	$clientID = DB::table('tblcgrm')
    		->select('intClientID')
    		->where('intCgrmID', $cgrmID)
    		->first();
    	
    	$guardID = DB::table('tblclient')
    		->join('tblcontract', 'tblcontract.intClientID', '=','tblclient.intClientID')
    		->join('tblclientguard' ,'tblclientguard.intContractID', '=','tblcontract.intContractID')
    		->join('tblguard', 'tblguard.intGuardID', '=','tblclientguard.intGuardID')
    		->select('tblguard.intGuardID')
    		->groupBy('tblclientguard.intGuardID')
    		->get();

    	$clientGuard = array();
    	foreach($guardID as $value){
    		$result = DB::table('tblclientguard')
    			->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
    			->select('tblguard.strFirstName', 'tblclientguard.boolStatus')
    			->where('tblclientguard.intGuardID' ,$value->intGuardID)
    			->where('tblclientguard.created_at', '<', $now)
    			->orderBy('tblclientguard.created_at', 'desc')
    			->first();
			
			if ($result->boolStatus == 1 || $result->boolStatus == 3){
				array_push($clientGuard, $result);
			}
    	}

    	return response()->json($clientGuard);
    }//get active guard in the cgrm

}
