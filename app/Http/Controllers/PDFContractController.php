<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class PDFContractController extends Controller
{

        public function getContract()
        {
            $pdf=PDF::loadView('pdf.contract');
            return $pdf->stream('contract.pdf');
        }
}
