<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;
use Carbon\Carbon;
use DB;

class PDFdtrController extends Controller
{
    public function getDTR(Request $request)
    {
    	$data = $request->session()->get('dtr');
    	
        $pdf=PDF::loadView('pdf.dtr', 
        	array(
        		'arrData' => $data->arrData,
        		'strGuardName' => $data->strGuardName,
        		'dateStart' => $data->dateStart,
        		'dateEnd' => $data->dateEnd
        	)
        );
        return $pdf->stream('dtr.pdf');
    }

    public function postDTR(Request $request){
    	$guardName = DB::table('tblguard')
    		->select('strFirstName', 'strLastName')
    		->where('intGuardID', $request->guardID)
    		->first();

    	$arrClientName = $request->arrClient;
    	$arrTimeIn = $request->arrTimeIn;
    	$arrTimeOut = $request->arrTimeOut;
    	$arrData = array();
    	for($intLoop = 0; $intLoop < count($arrClientName); $intLoop ++){
    		$value = new \stdClass();
    		$value->strClientName = $arrClientName[$intLoop];
    		$value->timeIn = $arrTimeIn[$intLoop];
    		$value->timeOut = $arrTimeOut[$intLoop];

    		array_push($arrData, $value);
    	}
    	$data = new \stdClass();
    	$data->arrData = $arrData;
    	$data->strGuardName = $guardName->strFirstName . ' ' . $guardName->strLastName;
    	$data->dateStart = (new Carbon($request->dateStart))->toFormattedDateString();
    	$data->dateEnd = (new Carbon($request->dateEnd))->toFormattedDateString();

    	$request->session()->put('dtr', $data);

    }
}
