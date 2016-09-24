<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFQueryGuardsController extends Controller
{
    public function getQueryGuards()
    {
        $pdf=PDF::loadView('pdf.queryguards');
        return $pdf->stream('queryguards.pdf');
    }
}
