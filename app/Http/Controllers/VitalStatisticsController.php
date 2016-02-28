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
}
