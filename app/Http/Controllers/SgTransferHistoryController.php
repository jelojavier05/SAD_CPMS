<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Input;

class SgTransferHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $arrGuard  = DB::table('tblguard')
            ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=' ,'tblguard.intGuardID')
            ->select('tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName', 'tblguardlicense.strLicenseNumber')
            ->where('tblguard.boolStatus', 1)
            ->get();

        return view('/sgTransferHistory')
            ->with('arrGuard', $arrGuard);
    }

    public function getGuardInformation(Request $request){
        $guardID = Input::get('guardID');
        $now = Carbon::now();

        $guardInformation = DB::table('tblguard')
            ->join('tblguardaddress', 'tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=' ,'tblguardaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID', '=', 'tblguardaddress.intCityID')
            ->select('tblguard.*', 'tblguardlicense.strLicenseNumber', 'tblguardaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName')
            ->where('tblguard.intGuardID', $guardID)
            ->first();
        $dateBirthday = new Carbon($guardInformation->dateBirthday);
        $guardInformation->age = Carbon::createFromDate($dateBirthday->year, $dateBirthday->month, $dateBirthday->day)->age;
        $guardTrackRecord = DB::table('tblclientguard')
            ->join('tblcontract', 'tblcontract.intContractID', '=', 'tblclientguard.intContractID')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblcontract.intClientID')
            ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfBusinessID')
            ->select('tblclient.strClientName', 'tblclientguard.boolStatus', 'tblclientguard.created_at', 'tblnatureofbusiness.strNatureOfBusiness')
            ->where('tblclientguard.intGuardID', $guardID)
            ->where('tblclientguard.boolStatus', '<>', 2)
            ->where('tblclientguard.created_at','<=', $now)
            ->orderBy('tblclientguard.created_at', 'asc')
            ->get();

        $trackRecord = array();
        foreach($guardTrackRecord as $value){
            $created_at = (new Carbon($value->created_at))->toDateString();
            $pdfCreated_at = (new Carbon($value->created_at))->toFormattedDateString();
            if ($value->boolStatus == 1 || $value->boolStatus == 3){ //1 active, 3 reliever
                $record = new \stdClass();
                $record->strClientName = $value->strClientName;
                $record->boolStatus = $value->boolStatus;
                $record->dateStart = $created_at;
                $record->dateEnd = 'Present';
                $record->strNatureOfBusiness = $value->strNatureOfBusiness;
                $record->pdfCreated_at = $pdfCreated_at;
                $record->pdfDateEnd = 'Present';


                if ($value->boolStatus == 1){
                    $record->boolStatus = 'Deployed';
                }else{
                    $record->boolStatus = 'Reliever';
                }
                // array_push($trackRecord, $record);
                array_unshift($trackRecord, $record);
            }else if ($value->boolStatus == 0){
                $record = array_pop($trackRecord);
                $record->dateEnd = $created_at;
                $record->pdfDateEnd = $pdfCreated_at;
                array_push($trackRecord, $record);
            }
        }//foreach

        $value = new \stdClass();
        $value->guardInformation = $guardInformation;
        $value->trackRecord = $trackRecord;

        $request->session()->put('guardTrackRecord', $value);

        return response()->json($value);
    }

}
