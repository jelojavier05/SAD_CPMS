<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Input;
class IncidentReportsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $arrIncidentReport = DB::table('tblreportincident')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblreportincident.intClientID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
            ->select('tblreportincident.datetimeReport', 'tblclient.strClientName', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblreportincident.intReportIncidentID')
            ->orderBy('datetimeReport', 'desc')
            ->get();

        foreach($arrIncidentReport as $value){
            $value->strDateReport = (new Carbon($value->datetimeReport))->toDayDateTimeString();
        }

        return view('/incidentReportsAdmin')
            ->with('arrIncidentReport', $arrIncidentReport);
    }

    public function getIncidentReportInformation(){
        $incidentReportID = Input::get('incidentReportID');

        $reportInfo = DB::table('tblreportincident')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblreportincident.intGuardID')
            ->select('tblreportincident.*', 'tblguard.strFirstName', 'tblguard.strLastName')
            ->where('intReportIncidentID', $incidentReportID)
            ->first();
        $reportInfo->strDateIncident = (new Carbon($reportInfo->datetimeIncident))->toDayDateTimeString();

        $reportInfo->witness = DB::table('tblincidentwitness')
            ->select('strWitnessName', 'strContactNumber')
            ->where('intReportIncidentID', $incidentReportID)
            ->get();

        return response()->json($reportInfo);
    }
}
