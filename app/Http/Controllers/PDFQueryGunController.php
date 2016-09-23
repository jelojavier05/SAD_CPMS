<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFQueryGunController extends Controller
{
    public function getQueryGun()
    {
        $pdf=PDF::loadView('pdf.querygun');
        return $pdf->stream('querygun.pdf');
    }
}