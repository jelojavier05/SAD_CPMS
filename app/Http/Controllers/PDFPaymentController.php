<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF; 
use Input;
use DB;
use Carbon\Carbon;

class PDFPaymentController extends Controller
{
	public function getPayment(Request $request){
		$paymentID = $request->session()->get('paymentID');
		// $request->session()->forget('paymentID');

		$paymentResult = DB::table('tblpayment')
			->join('tblclient', 'tblclient.intClientID', '=', 'tblpayment.intClientID')
			->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=','tblclient.intNatureOfBusinessID')
			->select('tblpayment.*', 'tblclient.strClientName', 'tblnatureofbusiness.strNatureOfBusiness')
			->where('intPaymentID', $paymentID)
			->first();
		$paymentResult->strDatetimepayment = (new Carbon($paymentResult->datetimePayment))->toFormattedDateString();

		$resultContractID = DB::table('tblbillpayment')
			->join('tblclientbillingdate', 'tblclientbillingdate.intClientBillingDateID', '=', 'tblbillpayment.intClientBillingDateID')
			->select('tblclientbillingdate.intContractID')
			->where('tblbillpayment.intPaymentID', $paymentID)
			->first();

		$arrBillingDate = DB::table('tblclientbillingdate')
			->select('*')
			->where('intContractID', $resultContractID->intContractID)
			->where('dateBill', '<=', $paymentResult->datetimePayment)
			->orderBy('dateBill', 'asc')
			->get();

		$resultBillPayment = DB::table('tblbillpayment')
			->select('intClientBillingDateID')
			->where('intPaymentID', $paymentID)
			->get();

		$clientID = $paymentResult->intClientID;

		$dateStart = DB::table('tblclientbillingdate')
			->select('dateBill')
			->where('intClientBillingDateID', $resultBillPayment[0]->intClientBillingDateID - 1)
			->first();
		$dateEnd = DB::table('tblclientbillingdate')
			->select('dateBill')
			->where('intClientBillingDateID', $resultBillPayment[count($resultBillPayment) - 1]->intClientBillingDateID)
			->first();

		$arrGuard = DB::table('tblattendance')
			->join('tblguard', 'tblguard.intGuardID', '=', 'tblattendance.intGuardID')
			->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName')
			->where('intClientID', $clientID)
			->where('datetimeOut', '>=', $dateStart->dateBill)
            ->where('datetimeOut', '<=', $dateEnd->dateBill)
            ->groupBy('intGuardID')
            ->get();

        $overAllTotalHour = 0;
        foreach($arrGuard as $valueGuard){
        	$totalHour = DB::table('tblattendance')
    			->select(DB::raw('SUM(deciTotalHours) as totalHours'))
        		->where('intClientID', $clientID)
        		->where('intGuardID', $valueGuard->intGuardID)
				->where('datetimeOut', '>=', $dateStart->dateBill)
                ->where('datetimeOut', '<=', $dateEnd->dateBill)
                ->first();
            $valueGuard->totalHour = $totalHour->totalHours;
            $overAllTotalHour += $totalHour->totalHours;
        }
		

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

		$overAllTotalAmount = 0;
		$arrBillPaid = array();
		foreach($resultBillPayment as $value){
			$dateStart = DB::table('tblclientbillingdate')
				->select('dateBill')
				->where('intClientBillingDateID', $value->intClientBillingDateID - 1)
				->first();

			$dateEnd = DB::table('tblclientbillingdate')
				->select('dateBill')
				->where('intClientBillingDateID', $value->intClientBillingDateID)
				->first();

			$totalHours = DB::table('tblattendance')
                ->select(DB::raw('SUM(deciTotalHours) as totalHours'))
                ->where('intClientID', $clientID)
                ->where('datetimeOut', '>=', $dateStart->dateBill)
                ->where('datetimeOut', '<=', $dateEnd->dateBill)
                ->first();

            $totalAmount = number_format((float)($deciRate * $totalHours->totalHours), 2, '.', '');

            $overAllTotalAmount += $totalAmount;
            $value->totalAmount = $totalAmount;
            $value->strDate = (new Carbon($dateEnd->dateBill))->toFormattedDateString();
            array_push($arrBillPaid, $value);
		}

		$data = new \stdClass();

		if ($paymentResult->tinyintType == 1){
			$checkDetail = DB::table('tblcheckinfo')
				->select('*')
				->where('intPaymentID', $paymentID)
				->first();
			$checkDetail->strDate = (new Carbon($checkDetail->dateIssued))->toFormattedDateString();
			$data->checkInfo = $checkDetail;
			$paymentResult->modeOfPayment = 'Cheque';
		}else{
			$paymentResult->modeOfPayment = 'Cash';
		}

		$data->clientPayment = $paymentResult;
		$data->arrGuard = $arrGuard;
		$data->billingDate = $arrBillPaid;
		$data->totalHours = $overAllTotalHour;
		$data->deciRate = $deciRate;
		$data->totalAmount = $overAllTotalAmount;


		$pdf=PDF::loadView('pdf.payment', array('data' => $data));
		return $pdf->stream('payment.pdf');
	}

	public function postPaymentPDF(Request $request){
		$paymentID = Input::get('paymentID');
		$request->session()->put('paymentID', $paymentID);
	}
}
