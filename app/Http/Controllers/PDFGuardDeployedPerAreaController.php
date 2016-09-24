<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFGuardDeployedPerAreaController extends Controller
{
      public function getGuardDeployedparea(Request $request)
        {
        	$pieInformation = $request->session()->get('pieInformation');
        	$tabularForm = $pieInformation->tabularForm;
        	$arrCityResult = $pieInformation->arrCity;

        	$dataTable = array();
        	$intCountCity = 0;
        	foreach($arrCityResult as $valueCity){
        		$intCityCountGuard = 0;
        		$intCityCountClient = 0;
        		$boolStatus = true;
        		$hasCity = false;
        		foreach($tabularForm as $valueTable){
        			if ($valueCity->strCityName == $valueTable->cityName){
        				$intCityCountGuard += $valueTable->clientCountGuard;
        				$dataRecord = new \stdClass();
	        			$dataRecord->strClientName = $valueTable->strClientName;
	        			$dataRecord->intCityCountGuard = $valueTable->clientCountGuard;
	        			$dataRecord->strCityName = '';
	        			if ($boolStatus){
	        				$dataRecord->strCityName = $valueCity->strCityName;
	        				$boolStatus = false;
	        			}
	        			$intCityCountClient++;
	        			array_push($dataTable, $dataRecord);
	        			$hasCity = true;
        			}
	        			
        		}//foreach client
        		
        		if ($hasCity){
        			$space = new \stdClass();
	    			$space->strClientName = '';
	    			$space->intCityCountGuard = '';
	    			$space->strCityName = '';

	    			array_push($dataTable, $space);
	    			//total Number
	        		$dataRecord = new \stdClass();
	    			$dataRecord->strClientName = $intCityCountClient;
	    			$dataRecord->intCityCountGuard = $intCityCountGuard;
	    			$dataRecord->strCityName = 'Total';
	    			//total number
	    			
	    			array_push($dataTable, $dataRecord);
	    			array_push($dataTable, $space);
	    			array_push($dataTable, $space);
	    			$intCountCity ++;
        		}
	        		
        	}//foreach city

        	$pieInformation->totalNumber->city = $intCountCity;
            $pdf=PDF::loadView('pdf.guardsdeployedperarea',
            	array(
            		'dataTable' => $dataTable,
            		'dateAsOf' => $pieInformation->dateAsOf,
            		'totalNumber' => $pieInformation->totalNumber

            	)
            );
            return $pdf->stream('guardsdeployedperarea.pdf');
        }
}
