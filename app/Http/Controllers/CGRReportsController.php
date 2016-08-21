<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
class CGRReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cgrmID = $request->session()->get('id');
        $now = Carbon::now();

        $clientID = DB::table('tblcgrm')
            ->select('intClientID')
            ->where('intCgrmID', $cgrmID)
            ->first();
        
        $guardID = DB::table('tblclient')
            ->join('tblcontract', 'tblcontract.intClientID', '=','tblclient.intClientID')
            ->join('tblclientguard' ,'tblclientguard.intContractID', '=','tblcontract.intContractID')
            ->join('tblguard', 'tblguard.intGuardID', '=','tblclientguard.intGuardID')
            ->select('tblguard.intGuardID')
            ->where('tblclient.intClientID', $clientID->intClientID)
            ->groupBy('tblclientguard.intGuardID')
            ->get();

        $clientGuard = array();
        foreach($guardID as $value){
            $result = DB::table('tblclientguard')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->select('tblguard.strFirstName','tblguard.strLastName','tblguard.intGuardID', 'tblclientguard.boolStatus')
                ->where('tblclientguard.intGuardID' ,$value->intGuardID)
                ->where('tblclientguard.created_at', '<', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            if ($result->boolStatus == 1 || $result->boolStatus == 3){                    
                array_push($clientGuard, $result);
            }
        }
        return view('/CGR/CGRReports')
            ->with('clientGuard', $clientGuard);
    }

}
