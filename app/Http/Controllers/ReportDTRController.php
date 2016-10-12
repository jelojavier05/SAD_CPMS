<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;

class ReportDTRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/reports/reportsDTR1');
    }

    public function getDTRperGuard(Request $request){
        $guardID = Input::get('guardID');
        $dateStart = new Carbon(Input::get('dateStart'));
        $dateEnd = new Carbon(Input::get('dateEnd'));
        $dateEnd->addDay();

        $dtrGuard = DB::table('tblattendance')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblattendance.intClientID')
            ->select('datetimeIn', 'datetimeOut', 'strClientName')
            ->where('intGuardID', $guardID)
            ->whereBetween('datetimeIn', [$dateStart, $dateEnd])
            ->get();

        foreach($dtrGuard as $value){
            $value->strTimeIn = (new Carbon($value->datetimeIn))->toDayDateTimeString();
            $value->strTimeOut = (new Carbon($value->datetimeOut))->toDayDateTimeString();
        }

        return response()->json($dtrGuard);
    }
}
