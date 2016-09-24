<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;
use Carbon\Carbon;

class PDFTrackTransferRecordController extends Controller
{
      public function getTrackTransfer(Request $request)
        {
        	$now = Carbon::now();
        	$data = $request->session()->get('guardTrackRecord');
        	$guardInformation = $data->guardInformation;
        	$trackRecord = $data->trackRecord;
            $pdf=PDF::loadView('pdf.tracktransfer', 
            	array(
            		'guardInformation' => $guardInformation, 
            		'trackRecord' => $trackRecord, 
            		'now' => $now
            	)
            );
            // $request->session()->forget('guardTrackRecord');
            return $pdf->stream('tracktransfer.pdf');
        }
}
