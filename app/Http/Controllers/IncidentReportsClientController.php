<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class IncidentReportsClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $clientID = $request->session()->get('id');

        $arrReport = DB::table('tblreportincident')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblreportincident.intGuardID')
            ->select('tblreportincident.datetimeReport', 'tblreportincident.strLocation', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblreportincident.intReportIncidentID')
            ->where('tblreportincident.intClientID', $clientID)
            ->orderBy('tblreportincident.datetimeReport', 'desc')
            ->get();

        foreach($arrReport as $value){
            $value->strDateReport = (new Carbon($value->datetimeReport))->toDayDateTimeString();
        }

        return view('client/incidentReportsClient')
            ->with('arrReport', $arrReport);
    }

}
