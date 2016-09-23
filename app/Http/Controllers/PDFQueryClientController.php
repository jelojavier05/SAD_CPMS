<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFQueryClientController extends Controller
{
    public function getQueryClient()
    {
        $pdf=PDF::loadView('pdf.queryclient');
        return $pdf->stream('queryclient.pdf');
    }
}