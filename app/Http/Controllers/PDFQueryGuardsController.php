<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFQueryGuardsController extends Controller
{
    public function getQueryGuards(Request $request)
    {
        $pdf=PDF::loadView('pdf.queryguards',
        	array(
	        	'strStatus' => $request->session()->get('strStatus'), 
	        	'strGender' => $request->session()->get('strGender'), 
	        	'strClientName' => $request->session()->get('strClientName'),
	        	'arrData' => $request->session()->get('arrData')
	        )
        );
        $request->session()->forget('strStatus');
        $request->session()->forget('strGender');
        $request->session()->forget('strClientName');
        $request->session()->forget('arrData');
        
        return $pdf->stream('queryguards.pdf');
    }

    public function postQueryGuard(Request $request){
    	$request->session()->put('strStatus', $request->strStatus);
    	$request->session()->put('strGender', $request->strGender);
    	$request->session()->put('strClientName', $request->strClientName);
    	
    	$arrLicenseNumber = $request->arrLicenseNumber;
    	$arrGuardName = $request->arrGuardName;
    	$arrGender = $request->arrGender;
    	$arrStatus = $request->arrStatus;
    	$arrClientName = $request->arrClientName;

    	$arrData = array();
    	for($intLoop = 0; $intLoop < count($arrLicenseNumber); $intLoop ++){
    		$value = new \stdClass();
    		$value->strLicenseNumber = $arrLicenseNumber[$intLoop];
    		$value->strGuardName = $arrGuardName[$intLoop];
    		$value->strGender = $arrGender[$intLoop];
    		$value->strStatus = $arrStatus[$intLoop];
    		$value->strClientName = $arrClientName[$intLoop];

    		array_push($arrData, $value);
    	}
    	$request->session()->put('arrData', $arrData);
    }

}
