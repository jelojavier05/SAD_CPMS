<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BodyAttribute;
use App\Model\Measurement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BodyAttributeController extends Controller
{
    public function index()
    {
        $bodyAttributes = BodyAttribute::where('deleted_at', null)->get();
        $measurements = Measurement::where('deleted_at', null)
            ->where('boolFlag', 1)->get();

        return view('maintenance.bodyAttribute')
            ->with('bodyAttributes', $bodyAttributes)
            ->with('measurements', $measurements);
    }
    
    public function getBodyAttribute(){
        $bodyAttribute = BodyAttribute::where('deleted_at', null)->get();
        return response()->json($bodyAttribute);
        //return $bodyAttribute;
    }

    public function addBodyAttribute(Request $request){
        $bodyAttribute = new BodyAttribute;

        try {
            $bodyAttribute->strBodyAttributeName = $request->bodyAttribute;
            $bodyAttribute->intMeasurementID = $request->measurementID;

            $bodyAttribute->save();

        } catch (Exception $e) {
            
        }
    }

    public function updateBodyAttribute(Request $request){
        try {
            BodyAttribute::where('intBodyAttributeID', $request->vitalStatisticsID)
            ->update(['strBodyAttributeName'=>$request->vitalStatistics,
                      'intMeasurementID' => $request->measurementID]);
        } catch (Exception $e) {
            
        }
        //return redirect()->route('vitalStatisticsIndex');
    }
    
    public function deleteBodyAttribute(Request $request){
        try {
            
			BodyAttribute::destroy($request->vitalStatisticsID);    
                
        } catch (Exception $e) {
            
        }
    }
    
    public function flagBodyAttribute(Request $request){
       	try {
            BodyAttribute::where('intBodyAttributeID', $request->vitalStatisticsID)
            ->update(['boolFlag' => $request->flag]);
        } catch (Exception $e) {
            alert();
        }
    }
}
