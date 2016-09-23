<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Input;

class ReportGuardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/reports/ReportGuard');
    }

    public function getPieInformation(){
        $arrCityResult = DB::table('tblcity')
            ->select('strCityName', 'intCityID')
            ->get();    

        $date = Input::get('dateReport');

        $arrPie = array();
        $arrClientGuardCount = array();
        $arrTabularForm = array();
        foreach($arrCityResult as $value){
            $arrClientResult = DB::table('tblclient')
                ->join('tblclientaddress', 'tblclientaddress.intClientID','=','tblclient.intClientID')
                ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblclient.intClientID')
                ->select('tblclient.intClientID', 'tblcontract.intContractID')
                ->where('tblclientaddress.intCityID', $value->intCityID)
                ->where('tblclient.intStatusIdentifier', 2)
                ->where('tblcontract.boolStatus', 1)
                ->get();

            $cityName = $value->strCityName;

            $cityResult = new \stdClass();
            $cityResult->name = $value->strCityName;
            $cityResult->drilldown = $value->intCityID;

            array_push($arrPie, $cityResult);

            $arrClientInformation = array();
            $intCounterTotalGuardInCity = 0;

            foreach($arrClientResult as $valueClient){
                $clientResult = DB::table('tblclient')
                    ->select('intClientID', 'strClientName')
                    ->where('intClientID', $valueClient->intClientID)
                    ->first();

                $arrGuard = DB::table('tblcontract')
                    ->join('tblclientguard', 'tblclientguard.intContractID', '=', 'tblcontract.intContractID')
                    ->select('tblclientguard.intGuardID')
                    ->where('tblcontract.intClientID', $valueClient->intClientID)
                    ->where('tblcontract.boolStatus', 1)
                    ->get();

                $countArrGuard = array();
                foreach($arrGuard as $valueGuardID){
                    $activeGuard = DB::table('tblclientguard')
                        ->select('boolStatus')
                        ->where('intGuardID', $valueGuardID->intGuardID)
                        ->where('intContractID', $valueClient->intContractID)
                        ->where('tblclientguard.created_at', '<=', $date)
                        ->first();

                    if (!is_null($activeGuard) && $activeGuard->boolStatus == 1){
                        array_push($countArrGuard, $activeGuard);
                    }
                }

                $objTabularForm = new \stdClass();//for the tabular form
                $objTabularForm->cityName = $cityName;
                $objTabularForm->strClientName = $clientResult->strClientName;
                $objTabularForm->clientCountGuard = count($countArrGuard);

                array_push($arrTabularForm, $objTabularForm);

                $intCounterTotalGuardInCity += count($countArrGuard);
                $clientInformation = [$clientResult->strClientName, count($countArrGuard)];
                array_push($arrClientInformation, $clientInformation);
            }

            $cityResult->y = $intCounterTotalGuardInCity;

            $clientResult = new \stdClass();
            $clientResult->name = $value->strCityName;
            $clientResult->id = $value->intCityID;
            $clientResult->data = $arrClientInformation;

            array_push($arrClientGuardCount, $clientResult);
        }

        $pieInformation = new \stdClass();
        $pieInformation->series = $arrPie;
        $pieInformation->drilldown = $arrClientGuardCount;
        $pieInformation->tabularForm = $arrTabularForm;
        
        return response()->json($pieInformation);
    }
}
