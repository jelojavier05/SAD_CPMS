<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UnitOfMeasurement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnitOfMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitOfMeasurements = UnitOfMeasurement::get();

        return view ('maintenance.unitOfMeasurement',['unitOfMeasurements'=>$unitOfMeasurements]);
    }

    public function addUnitOfMeasurement(Request $request){
        $unitOfMeasurement = new UnitOfMeasurement;

        $unitOfMeasurement->strUnitOfMeasurement = $request->unitOfMeasurement;

        $unitOfMeasurement->save();

        return redirect()->route('unitOfMeasurementIndex');
    }

    public function updateUnitOfMeasurement(Request $request){
        UnitOfMeasurement::where('intUnitOfMeasurementID', $request->unitOfMeasurementID)
        ->update(['strUnitOfMeasurement'=>$request->unitOfMeasurement]);


        return redirect()->route('unitOfMeasurementIndex');
    }
}
