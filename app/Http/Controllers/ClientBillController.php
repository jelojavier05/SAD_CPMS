<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class ClientBillController extends Controller
{
    public function index()
    {
        return view('/client/clientBill');
    }

    public function getPaidBill(Request $request){
    	$clientID = $request->session()->get('id');
    	$arrPayment = DB::table('tblpayment')
    		->select('*')
    		->where('intClientID', $clientID)
    		->get();

    	foreach($arrPayment as $value){
    		$value->strDate = (new Carbon($value->datetimePayment))->toFormattedDateString();
    	}//foreach

    	return response()->json($arrPayment);
    }

}
