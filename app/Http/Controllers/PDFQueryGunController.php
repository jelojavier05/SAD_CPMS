<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFQueryGunController extends Controller
{
    public function getQueryGun(Request $request)
    {
        $pdf=PDF::loadView('pdf.querygun',
        	array(
	        	'strStatus' => $request->session()->get('strStatus'), 
	        	'strGunType' => $request->session()->get('strGunType'), 
	        	'strClientName' => $request->session()->get('strClientName'),
	        	'arrData' => $request->session()->get('arrData')
	        )
        );
        return $pdf->stream('querygun.pdf');
    }

    public function postQueryGun(Request $request){
    	$request->session()->put('strStatus', $request->strStatus);
    	$request->session()->put('strGunType', $request->strGunType);
    	$request->session()->put('strClientName', $request->strClientName);
    	
    	$arrGunType = $request->arrGunType;
    	$arrLicenseNumber = $request->arrLicenseNumber;
    	$arrGunName = $request->arrGunName;
    	$arrStatus = $request->arrStatus;
    	$arrClientName = $request->arrClientName;

    	$arrData = array();
    	for($intLoop = 0; $intLoop < count($arrGunType); $intLoop ++){
    		$value = new \stdClass();
    		$value->strGunType = $arrGunType[$intLoop];
    		$value->strLicenseNumber = $arrLicenseNumber[$intLoop];
    		$value->strGunName = $arrGunName[$intLoop];
    		$value->strStatus = $arrStatus[$intLoop];
    		$value->strClientName = $arrClientName[$intLoop];

    		array_push($arrData, $value);
    	}
    	$request->session()->put('arrData', $arrData);
    }
}