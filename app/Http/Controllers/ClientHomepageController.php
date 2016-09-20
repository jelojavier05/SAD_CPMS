<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ClientHomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/client/ClientHomepage');
    }

    public function getPresentGuard(Request $request){
        $clientID = $request->session()->get('id');

        $presentGuard = DB::table('tblattendance')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblattendance.intGuardID')
            ->select('tblguard.strFirstName', 'tblguard.strLastName', 'tblguard.strGender')
            ->where('tblattendance.intClientID', $clientID)
            ->where('tblattendance.datetimeOut', '0000-00-00 00:00:00')
            ->get();

        return response()->json($presentGuard);
    }

    public function getAttendanceLog(Request $request){
        $clientID = $request->session()->get('id');

        $timeIn = DB::table('tblattendance')
            ->select('datetimeIn', 'intGuardID')
            ->where('intClientID', $clientID)
            ->get();

        $timeOut = DB::table('tblattendance')
            ->select('datetimeOut', 'intGuardID')
            ->where('intClientID', $clientID)
            ->get();

        $attendanceLog = array(); 
        foreach ($timeIn as $value){
            $guardName = DB::table('tblguard')
                ->select('strFirstName', 'strLastName')
                ->where('intGuardID', $value->intGuardID)
                ->first();

            $attendance = new \stdClass();
            $attendance->guardName = $guardName->strFirstName . ' ' . $guardName->strLastName;
            $attendance->dateTimeIn = $value->datetimeIn;
            $attendance->identifier = 1;
            $attendance->dateTime = date('M d - H:i', strtotime($attendance->dateTimeIn)); 

            // array_push($attendanceLog, $attendance);
            $attendanceLog [$value->datetimeIn] = $attendance;
        }

        foreach($timeOut as $value){
            $guardName = DB::table('tblguard')
                ->select('strFirstName', 'strLastName')
                ->where('intGuardID', $value->intGuardID)
                ->first();

            if (!($value->datetimeOut == '0000-00-00 00:00:00')){
                $attendance = new \stdClass();
                $attendance->guardName = $guardName->strFirstName . ' ' . $guardName->strLastName;
                $attendance->dateTimeOut = $value->datetimeOut;
                $attendance->identifier = 0;
                $attendance->dateTime = date('M d - H:i', strtotime($attendance->dateTimeOut)); 
                $attendanceLog [$value->datetimeOut] = $attendance;
            }
        }

        return response()->json($attendanceLog);
    }
}
