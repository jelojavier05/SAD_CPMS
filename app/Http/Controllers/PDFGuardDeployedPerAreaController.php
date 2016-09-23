<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFGuardDeployedPerAreaController extends Controller
{
      public function getGuardDeployedparea()
        {
            $pdf=PDF::loadView('pdf.guardsdeployedperarea');
            return $pdf->stream('guardsdeployedperarea.pdf');
        }
}
