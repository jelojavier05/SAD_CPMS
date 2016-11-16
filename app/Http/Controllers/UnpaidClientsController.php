<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Input;
class UnpaidClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){  

        $unpaidBillDate = new Carbon(); 
        $unpaidBills = DB::table('tblclientbillingdate')
            ->join('tblcontract', 'tblcontract.intContractID', '=', 'tblclientbillingdate.intContractID')
            ->join('tblclient', 'tblclient.intClientID','=', 'tblcontract.intClientID')
            ->select('tblclient.strClientName', 'tblclient.intClientID')
            ->where('tblclientbillingdate.dateBill', '<=', $unpaidBillDate)
            ->where('tblclientbillingdate.boolStatus', 1)
            ->groupBy('tblclient.intClientID')
            ->get();
        return view('/UnpaidClients2')
            ->with('unpaidBill', $unpaidBills);
    }

    public function getUnpaidBill(Request $request){
        $clientID = Input::get('clientID');
        $now = Carbon::now();
        if (is_null($clientID)){
            $clientID = $request->session()->get('id');
        }

        $billingDate = DB::table('tblcontract')
            ->join('tblclientbillingdate', 'tblclientbillingdate.intContractID', '=', 'tblcontract.intContractID')
            ->select('tblclientbillingdate.dateBill', 'tblclientbillingdate.boolStatus', 'tblclientbillingdate.intClientBillingDateID')
            ->where('tblcontract.intClientID', $clientID)
            ->where('tblcontract.boolStatus', 1)
            ->where('tblclientbillingdate.dateBill', '<=', $now)
            ->orderBy('tblclientbillingdate.dateBill', 'asc')
            ->get();

        $result = DB::table('tblcontract')
            ->join('tblcontractrate', 'tblcontractrate.intContractID', '=', 'tblcontract.intContractID')
            ->select('tblcontractrate.deciRate')
            ->where('tblcontract.intClientID', $clientID)
            ->where('tblcontract.boolStatus', 1)
            ->where('tblcontractrate.datetimeEffectivity', '<=', $now)
            ->orderBy('tblcontractrate.datetimeEffectivity', 'desc')
            ->first();
        $deciRate = $result->deciRate;

        $arrUnpaidBill = array();
        for($intLoop = 0; $intLoop < count($billingDate); $intLoop ++){
            if ($billingDate[$intLoop]->boolStatus == 1){
                $dateStart = $billingDate[$intLoop - 1]->dateBill;
                $dateEnd = $billingDate[$intLoop]->dateBill;

                $totalHours = DB::table('tblattendance')
                    ->select(DB::raw('SUM(deciTotalHours) as totalHours'))
                    ->where('intClientID', $clientID)
                    ->where('datetimeOut', '>=', $dateStart)
                    ->where('datetimeOut', '<=', $dateEnd)
                    ->first();

                $totalAmount = number_format((float)($deciRate * $totalHours->totalHours), 2, '.', '');

                $billingDate[$intLoop]->totalAmount = $totalAmount;
                $billingDate[$intLoop]->strDate = (new Carbon($dateEnd))->toFormattedDateString();
                array_push($arrUnpaidBill, $billingDate[$intLoop]);
            }//if else
        }//foreach

        return response()->json($arrUnpaidBill);
    }

    public function payBill(Request $request){
        $arrCheckedBill = $request->arrCheckedBill;
        $deciTotalAmount = $request->deciTotalAmount;
        $paymentMode = $request->paymentMode;
        $now = Carbon::now();
        $clientID = $request->clientID;
        $receiptNumber = $request->strReceiptNumber;

        try{
            DB::beginTransaction();

            $paymentID = DB::table('tblpayment')->insertGetId([
                'deciAmount' => $deciTotalAmount,
                'intClientID' => $clientID,
                'strReceiptNumber' => $receiptNumber,
                'tinyintType' => $paymentMode,
                'datetimePayment' => $now
            ]);

            if ($paymentMode == 1){
                DB::table('tblcheckinfo')->insert([
                    'intPaymentID' => $paymentID,
                    'strBankName' => $request->bankName,
                    'strClientName' => $request->clientName,
                    'strAccountNumber' => $request->checkNumber,
                    'deciAmount' => $request->amount, 
                    'dateIssued' => $request->dateIssued
                ]);
            }

            foreach($arrCheckedBill as $value){
                DB::table('tblclientbillingdate')
                    ->where('intClientBillingDateID', $value)
                    ->update([
                        'boolStatus' => 2
                    ]);

                DB::table('tblbillpayment')->insert([
                    'intClientBillingDateID' => $value,
                    'intPaymentID'=> $paymentID
                ]);
            }

            DB::commit();   
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function isReceiptNumberExist(Request $request){
        $strReceiptNumber = Input::get('receiptNumber');

        $count = DB::table('tblpayment')
            ->where('strReceiptNumber', $strReceiptNumber)
            ->count();

        return response()->json($count);
    }
}
