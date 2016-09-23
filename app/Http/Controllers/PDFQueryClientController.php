<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFQueryClientController extends Controller
{
    public function getQueryClient(Request $request)
    {

        $pdf=PDF::loadView('pdf.queryclient', 
        	array(
	        	'natureOfBusiness' => $request->session()->get('natureOfBusiness'), 
	        	'contractType' => $request->session()->get('contractType'), 
	        	'province' => $request->session()->get('province'), 
	        	'city' => $request->session()->get('city'),
	        	'arrData' => $request->session()->get('arrData')
	        )
        );
        return $pdf->stream('queryclient.pdf');
    }

    public function postQueryClient(Request $request){
    	$request->session()->put('natureOfBusiness', $request->natureOfBusiness);
    	$request->session()->put('contractType', $request->contractType);
    	$request->session()->put('province', $request->province);
    	$request->session()->put('city', $request->city);

    	$arrNOB = $request->arrNOB;
    	$arrContract = $request->arrContract;
    	$arrClientName = $request->arrClientName;
    	$arrPerson = $request->arrPerson;
    	$arrProvince = $request->arrProvince;
    	$arrCity = $request->arrCity;

    	$arrData = array();
    	for($intLoop = 0; $intLoop < count($arrNOB); $intLoop ++){
    		$value = new \stdClass();
    		$value->nob = $arrNOB[$intLoop];
    		$value->contract = $arrContract[$intLoop];
    		$value->clientName = $arrClientName[$intLoop];
    		$value->person = $arrPerson[$intLoop];
    		$value->province = $arrProvince[$intLoop];
    		$value->city = $arrCity[$intLoop];

    		array_push($arrData, $value);
    	}
    	$request->session()->put('arrData', $arrData);
    }
}