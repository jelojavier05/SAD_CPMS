<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class ManualDTRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/manualDTR');
    }

    public function insertManualDTR(Request $request){
    	$guardID = $request->guardID;
    	$clientID = $request->clientID;
    	$datetimeFrom = new Carbon($request->datetimeFrom);
    	$datetimeTo = new Carbon($request->datetimeTo);
    	$dateDifference = $datetimeFrom->diffInMinutes($datetimeTo);
		$dateDifference = $dateDifference * (1/60);

    	DB::table('tblattendance')->insert([
    		'intGuardID' => $guardID,
    		'intClientID' => $clientID,
    		'datetimeIn' => $datetimeFrom,
    		'datetimeOut' => $datetimeTo,
    		'deciTotalHours' => $dateDifference
    	]);

    }

}
