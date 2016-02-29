<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\VitalStatistics;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VitalStatisticsController extends Controller
{
    public function index()
    {
        $vitalStatistics = VitalStatistics::where('deleted_at', null)->paginate(5);

        return view('maintenance.vitalStatistics',['vitalStatistics'=>$vitalStatistics]);
    }

    public function addVitalStatistics(Request $request){
        $vitalStatistics = new VitalStatistics;

        try {
            $vitalStatistics->strVitalStatisticsName = $request->vitalStatistics;

            $vitalStatistics->save();

        } catch (Exception $e) {
            alert();            
        }
        return redirect()->route('vitalStatisticsIndex');
    }

    public function updateVitalStatistics(Request $request){
        try {
            VitalStatistics::where('intVitalStatisticsID', $request->vitalStatisticsID)
            ->update(['strVitalStatisticsName'=>$request->vitalStatistics]);
        } catch (Exception $e) {
            alert();
        }
        return redirect()->route('vitalStatisticsIndex');
    }
    
    public function deleteVitalStatistics(Request $request){
        try {
            if($request->okayCancelChecker == "okay"){
                $vitalStatistics = VitalStatistics::destroy($request->vitalStatisticsID);    
                return redirect()->route('vitalStatisticsIndex');  
            }
        } catch (Exception $e) {
            
        }
         
    }
}
