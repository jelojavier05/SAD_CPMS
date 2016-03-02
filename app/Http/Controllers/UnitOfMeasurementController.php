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
        $unitOfMeasurements = UnitOfMeasurement::where('deleted_at', null)->paginate(5);

        return view ('maintenance.unitOfMeasurement',['unitOfMeasurements'=>$unitOfMeasurements]);
    }

    public function addUnitOfMeasurement(Request $request){
        $unitOfMeasurement = new UnitOfMeasurement;
        
        try {
            $unitOfMeasurement->strUnitOfMeasurement = $request->unitOfMeasurementName;

            $unitOfMeasurement->save();
        } catch (Exception $e) {
            alert();
        }
        
        return redirect()->route('unitOfMeasurementIndex');
    }

    public function updateUnitOfMeasurement(Request $request){
        try {
            UnitOfMeasurement::where('intUnitOfMeasurementID', $request->unitOfMeasurementID)
            ->update(['strUnitOfMeasurement'=>$request->unitOfMeasurement]);
        } catch (Exception $e) {
            alert();
        }
        return redirect()->route('unitOfMeasurementIndex');
    }
    
    public function deleteUnitOfMeasurement(Request $request){
        try {
            if($request->okayCancelChecker == "okay"){
                $unitOfMeasurement = UnitOfMeasurement::destroy($request->unitOfMeasurementID);    
                
            }
        } catch (Exception $e) {
            
        }

        return redirect()->route('unitOfMeasurementIndex');  
         
    }


}
