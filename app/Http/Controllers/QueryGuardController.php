<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class QueryGuardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $arrClient = DB::table('tblclient')
            ->select('strClientName')
            ->where('intStatusIdentifier', 2)
            ->get();

        return view('/queries/guard')
            ->with('arrClient', $arrClient);
    }

    public function getQueryGuard(Request $request){
        $now = Carbon::now();

        $arrGuard = DB::table('tblguard')
            ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblguard.strGender', 'tblguardlicense.strLicenseNumber')
            ->where('tblguard.boolStatus', 1)
            ->get();

        foreach($arrGuard as $value){
            $resultStatus = DB::table('tblguardstatus')
                ->select('intStatusIdentifier')
                ->where('intGuardID', $value->intGuardID)
                ->where('dateEffectivity', '<=', $now)
                ->orderBy('dateEffectivity', 'desc')
                ->first();
            $status = $resultStatus->intStatusIdentifier;

            if ($status == 0 || $status == 5){
                $status = 'Waiting';
                $clientName = 'None';
            }else if ($status == 2 || $status == 3){
                $status = 'Active';
            }else if ($status == 4){
                $status = 'Reliever';
            }else if ($status == 1){
                $status = 'Pending';
                $clientName = 'None';
            }

            if ($status == 'Active' || $status == 'Reliever'){
                $resultClient = DB::table('tblclientguard')
                    ->join('tblcontract','tblcontract.intContractID', '=', 'tblclientguard.intContractID')
                    ->join('tblclient', 'tblclient.intClientID', '=', 'tblcontract.intClientID')
                    ->select('tblclient.strClientName')
                    ->where('tblclientguard.intGuardID', $value->intGuardID)
                    ->where('tblcontract.boolStatus', 1)
                    ->whereIn('tblclientguard.boolStatus', [1, 2])
                    ->where('tblclientguard.created_at', '<=', $now)
                    ->orderBy('tblclientguard.created_at', 'desc')
                    ->first();

                $clientName = $resultClient->strClientName;
            }

            $value->clientName = $clientName;
            $value->status = $status;
        }//foreach

        return response()->json($arrGuard);
    }
}