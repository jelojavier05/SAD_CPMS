<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF; 


class PDFPaymentController extends Controller
{
      public function getPayment()
        {
            $pdf=PDF::loadView('pdf.payment');
            return $pdf->stream('payment.pdf');
        }
}
