<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Input;

class ReportsIncidentReportsController extends Controller
{
    public function index(){
        return view('/reports/reportsIncidentReports');
    }

    public function getIncidentPerArea(Request $request){
    	$arrCity = DB::table('tblcity')
    		->select('*')
    		->where('deleted_at', null)
    		->get();

    	// $year = Input::get('year');
    	$year = 2016;
    	$dateStart = Carbon::now();
    	$dateStart->day = 1;
    	$dateStart->year = $year;
    	$dateEnd = Carbon::now();
    	$dateEnd->year = $year;

    	$arrIncidentReport = array();
    	foreach($arrCity as $value){
    		$objIncidentReport = new \stdClass();
    		$objIncidentReport->name = $value->strCityName;

    		$arrCountPerMonth = array();
    		for ($intLoop = 1; $intLoop <= 12; $intLoop ++){
    			$dateStart->month = $intLoop;
    			$dateEnd->month = $intLoop;
    			$dateEnd->day = $dateEnd->daysInMonth;

    			$intCountPerMonth = DB::table('tblreportincident')
    				->join('tblclient', 'tblclient.intClientID', '=', 'tblreportincident.intClientID')
    				->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
    				->whereBetween('tblreportincident.datetimeReport', [$dateStart, $dateEnd])
    				->where('tblclientaddress.intCityID', $value->intCityID)
    				->count();

    			array_push($arrCountPerMonth, $intCountPerMonth);
    		}//for loop
    		$objIncidentReport->data = $arrCountPerMonth;
    		array_push($arrIncidentReport, $objIncidentReport);
    	}//foreach

    	return response()->json($arrIncidentReport);
    }

    public function getIncidentPerNatureOfBusiness(Request $request){
    	$arrNOB = DB::table('tblnatureofbusiness')
    		->select('*')
    		->where('deleted_at', null)
    		->get();

    	// $year = Input::get('year');
    	$year = 2016;
    	$dateStart = Carbon::now();
    	$dateStart->day = 1;
    	$dateStart->year = $year;
    	$dateEnd = Carbon::now();
    	$dateEnd->year = $year;

    	$arrIncidentReport = array();
    	foreach($arrNOB as $value){
    		$objIncidentReport = new \stdClass();
    		$objIncidentReport->name = $value->strNatureOfBusiness;

    		$arrCountPerMonth = array();
    		for ($intLoop = 1; $intLoop <= 12; $intLoop ++){
    			$dateStart->month = $intLoop;
    			$dateEnd->month = $intLoop;
    			$dateEnd->day = $dateEnd->daysInMonth;

    			$intCountPerMonth = DB::table('tblreportincident')
    				->join('tblclient', 'tblclient.intClientID', '=', 'tblreportincident.intClientID')
    				->whereBetween('tblreportincident.datetimeReport', [$dateStart, $dateEnd])
    				->where('tblclient.intNatureOfBusinessID', $value->intNatureOfBusinessID)
    				->count();

    			array_push($arrCountPerMonth, $intCountPerMonth);
    		}//for loop
    		$objIncidentReport->data = $arrCountPerMonth;
    		array_push($arrIncidentReport, $objIncidentReport);
    	}//foreach

    	return response()->json($arrIncidentReport);
    }
}
