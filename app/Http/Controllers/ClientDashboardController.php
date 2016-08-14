<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
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
}
