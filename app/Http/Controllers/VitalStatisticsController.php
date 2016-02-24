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
        $vitalStatistics = VitalStatistics::where('bitFlag', 1)
        ->get();

        return view('maintenance.vitalStatistics',['vitalStatistics'=>$vitalStatistics]);
    }

    public function addVitalStatistics(Request $request){
        $vitalStatistics = new VitalStatistics;

        $vitalStatistics->strVitalStatisticsName = $request->vitalStatistics;

        $vitalStatistics->save();

        return redirect()->route('vitalStatisticsIndex');
    }
}
