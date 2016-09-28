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
        $arrTabularReport = array();
        $intTotalNumberOfIncident = 0;

    	foreach($arrCity as $value){
    		$objIncidentReport = new \stdClass();
    		$objIncidentReport->name = $value->strCityName;

            $objTabularReport = new \stdClass();
            $objTabularReport->name = $value->strCityName;

    		$arrCountPerMonth = array();
            $intCountPerCity = 0;
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

                $intCountPerCity += $intCountPerMonth;
                $intTotalNumberOfIncident += $intCountPerMonth;

    			array_push($arrCountPerMonth, $intCountPerMonth);
    		}//for loop
    		$objIncidentReport->data = $arrCountPerMonth;
            $objTabularReport->count = $intCountPerCity;

            array_push($arrTabularReport, $objTabularReport);
    		array_push($arrIncidentReport, $objIncidentReport);
    	}//foreach

        $data = new \stdClass();
        $data->graphReport = $arrIncidentReport;
        $data->tabularReport = $arrTabularReport;
        $data->count = count($arrCity);
        $data->totalNumber = $intTotalNumberOfIncident;

    	return response()->json($data);
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

        $arrTabularReport = array();
    	$arrIncidentReport = array();
        $intTotalNumberOfIncident = 0;
    	foreach($arrNOB as $value){
    		$objIncidentReport = new \stdClass();
    		$objIncidentReport->name = $value->strNatureOfBusiness;

            $objTabularReport = new \stdClass();
            $objTabularReport->name = $value->strNatureOfBusiness;

    		$arrCountPerMonth = array();
            $intCountPerNOB = 0;
    		for ($intLoop = 1; $intLoop <= 12; $intLoop ++){
    			$dateStart->month = $intLoop;
    			$dateEnd->month = $intLoop;
    			$dateEnd->day = $dateEnd->daysInMonth;

    			$intCountPerMonth = DB::table('tblreportincident')
    				->join('tblclient', 'tblclient.intClientID', '=', 'tblreportincident.intClientID')
    				->whereBetween('tblreportincident.datetimeReport', [$dateStart, $dateEnd])
    				->where('tblclient.intNatureOfBusinessID', $value->intNatureOfBusinessID)
    				->count();

                $intCountPerNOB += $intCountPerMonth;
                $intTotalNumberOfIncident += $intCountPerMonth;

    			array_push($arrCountPerMonth, $intCountPerMonth);
    		}//for loop



    		$objIncidentReport->data = $arrCountPerMonth;
            $objTabularReport->count = $intCountPerNOB;

            array_push($arrTabularReport, $objTabularReport);
    		array_push($arrIncidentReport, $objIncidentReport);
    	}//foreach




        $data = new \stdClass();
        $data->graphReport = $arrIncidentReport;
        $data->tabularReport = $arrTabularReport;
        $data->count = count($arrNOB);
        $data->totalNumber = $intTotalNumberOfIncident;

        return response()->json($data);
    }
}
