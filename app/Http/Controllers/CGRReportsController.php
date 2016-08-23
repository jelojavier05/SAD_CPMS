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
    public function index(Request $request){
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

            if (!is_null($result) && ($result->boolStatus == 1 || $result->boolStatus == 3)){                    
                array_push($clientGuard, $result);
            }
        }
        return view('/CGR/CGRReports')
            ->with('clientGuard', $clientGuard);
    }

    public function postReport(Request $request){
        $cgrmID = $request->session()->get('id');
        $guardID = $request->intGuardID;
        $datetimeIncident = $request->datetimeIncident;
        $location = $request->location;
        $description = $request->description;
        $arrWitnessName = $request->arrWitnessName;
        $arrContactNumber = $request->arrContactNumber;

        try{
            DB::beginTransaction();
            $result = DB::table('tblcgrm')
                ->select('intClientID')
                ->where('intCgrmID', $cgrmID)
                ->first();
            $clientID = $result->intClientID;

            $incidentID = DB::table('tblreportincident')
            ->insertGetId([
                'intClientID' => $clientID,
                'intGuardID' => $guardID,
                'datetimeIncident' => $datetimeIncident,
                'strLocation' => $location, 
                'strDescription' => $description
            ]);

            for($intLoop = 0; $intLoop < count($arrWitnessName); $intLoop ++){
                DB::table('tblincidentwitness')
                    ->insert([
                        'intReportIncidentID' => $incidentID, 
                        'strWitnessName' => $arrWitnessName[$intLoop],
                        'strContactNumber' => $arrContactNumber[$intLoop],
                    ]);
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    
}
