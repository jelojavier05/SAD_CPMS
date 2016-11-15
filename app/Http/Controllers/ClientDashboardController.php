<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class ClientDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('/client/ClientDashboard');
    }

    public function getClientInformation(Request $request){
        $clientID = $request->session()->get('id');

        $clientInformation = DB::table('tblclient')
            ->select('strClientName')
            ->where('intClientID', $clientID)
            ->first();

        return response()->json($clientInformation);
    }

    public function hasUnpaidBills(Request $request){
        $clientID = $request->session()->get('id');
        $now = new Carbon();
        $result = DB::table('tblcontract')
            ->select('intContractID')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
            ->first();
        $contractID = $result->intContractID;

        $countUnpaidBill = DB::table('tblclientbillingdate')
            ->where('boolStatus', 1)
            ->where('dateBill', '<=', $now)
            ->where('intContractID', $contractID)
            ->count();

        return response()->json($countUnpaidBill);
    }
}
