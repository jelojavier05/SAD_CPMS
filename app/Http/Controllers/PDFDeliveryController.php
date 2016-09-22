<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF; 

class PDFDeliveryController extends Controller
{
     public function getDelivery()
        {
            $pdf=PDF::loadView('pdf.delivery');
            return $pdf->stream('delivery.pdf');
        }
}
