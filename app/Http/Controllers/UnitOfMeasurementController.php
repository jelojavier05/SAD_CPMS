<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Measurement;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class UnitOfMeasurementController extends Controller
{
    
    public function index(){
        $measurement = Measurement::where('deleted_at', null)->get();
        
        return view('/maintenance/unitOfMeasurement')
            ->with('measurements', $measurement);
    }   
    
    public function get(){
        $measurement = Measurement::where('deleted_at', null)->get();
        
        return response()->json($measurement);
    }
    
    public function create(Request $request){
        try{
            $measurement = new Measurement;

            $measurement->strMeasurement = $request->measurement;
            
            $measurement->save();
        }catch(Exception $e){
            
        }
    }
    
    public function update(Request $request){
        try {
            Measurement::where('intMeasurementID', $request->measurementID)
            ->update(['strMeasurement'=>$request->measurement]);
        } catch (Exception $e) {
            
        }
    }
    
    public function delete(Request $request){
        try {
            
			Measurement::destroy($request->measurementID);    
                
            
        } catch (Exception $e) {
            
        }
    }
    
    public function flag(Request $request){
       	try {
            Measurement::where('intMeasurementID', $request->id)
            ->update(['boolFlag' => $request->flag]);
        } catch (Exception $e) {
            
        }
    }
}