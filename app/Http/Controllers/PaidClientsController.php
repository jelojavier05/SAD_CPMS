<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class PaidClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('/paidClients');
    }

    public function getPaidClient(){
        $arrPaidClient = DB::table('tblpayment')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblpayment.intClientID')
            ->select('tblclient.strClientName', 'tblpayment.datetimePayment', 'tblpayment.deciAmount', 'tblpayment.intPaymentID')
            ->get();

        return response()->json($arrPaidClient);
    }
}
