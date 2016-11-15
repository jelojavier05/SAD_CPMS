<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF; 
use Input;
use DB;

class PDFPaymentController extends Controller
{
	public function getPayment(Request $request){
		$paymentID = $request->session()->get('paymentID');
		$request->session()->forget('paymentID');

		$paymentResult = DB::table('tblpayment')
			->select('*')
			->where('intPaymentID', $paymentID)
			->first();

		$result = DB::table('tblpayment')
			->join('tblcontract', 'tblcontract.intClientID', '=', 'tblpayment.intClientID')
			->join('tblcontractrate', 'tblcontractrate.intContractID', '=', 'tblcontract.intContractID')
			->select('tblcontractrate.deciRate')
			->where('tblpayment.intPaymentID', $paymentID)
			->where('tblcontract.boolStatus', 1)
			->where('tblcontractrate.datetimeEffectivity', '<=', $paymentResult->datetimePayment)
			->orderBy('tblcontractrate.datetimeEffectivity', 'desc')
			->first();
		$deciRate = $result->deciRate;

		$pdf=PDF::loadView('pdf.payment');
		return $pdf->stream('payment.pdf');
	}

	public function postPaymentPDF(Request $request){
		$paymentID = Input::get('paymentID');
		$request->session()->put('paymentID', $paymentID);
	}
}
