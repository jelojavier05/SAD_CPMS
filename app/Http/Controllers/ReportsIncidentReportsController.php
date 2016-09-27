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

    public function getIncidentReportPerArea(Request $request){
    	$arrCity = DB::table('tblcity')
    		->select('*')
    		->where('deleted_at', null)
    		->get();
    	$year = Input::get('year');

    	$arrIncidentReport = array();

    	$dateStart = Carbon::now();
    	$dateStart->day = 1;
    	$dateStart->year = $year;

    	$dateEnd = Carbon::now();
    	$dateEnd->year = $year;

    	foreach($arrCity as $value){
    		$objIncidentReport = new \stdClass();
    		$objIncidentReport->name = $value->strCityName;

    		$arr
    		for ($intLoop = 1; $intLoop <= 12; $intLoop ++){
    			$dateStart->month = $intLoop;
    			$dateEnd->month = $intLoop;
    			$dateEnd->day = $dateEnd->daysInMonth;

    			
    		}//for loop
    	}//foreach
    }
}
