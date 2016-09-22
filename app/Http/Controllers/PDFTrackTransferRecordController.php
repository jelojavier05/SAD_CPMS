<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;


class PDFTrackTransferRecordController extends Controller
{
      public function getTrackTransfer()
        {
            $pdf=PDF::loadView('pdf.tracktransfer');
            return $pdf->stream('tracktransfer.pdf');
        }
}
