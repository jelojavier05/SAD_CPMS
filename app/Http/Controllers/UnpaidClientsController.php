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
        return view('/UnpaidClients1')
            ->with('unpaidBill', $unpaidBills);
    }

    public function getUnpaidBill(){
        $clientID = Input::get('clientID');
        $now = Carbon::now();

        $billingDate = DB::table('tblcontract')
            ->join('tblclientbillingdate', 'tblclientbillingdate.intContractID', '=', 'tblcontract.intContractID')
            ->select('tblclientbillingdate.dateBill', 'tblclientbillingdate.boolStatus', 'tblclientbillingdate.intClientBillingDateID')
            ->where('tblcontract.intClientID', $clientID)
            ->where('tblcontract.boolStatus', 1)
            ->where('tblclientbillingdate.dateBill', '<=', $now)
            ->orderBy('tblclientbillingdate.dateBill', 'asc')
            ->get();

        $result = DB::table('tblcontract')
            ->select('deciRate')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
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

                $totalAmount = $deciRate * $totalHours->totalHours;

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

        try{
            DB::beginTransaction();

            $paymentID = DB::table('tblpayment')->insertGetId([
                'deciAmount' => $deciTotalAmount,
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
}
