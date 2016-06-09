<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BodyAttribute;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BodyAttributeController extends Controller
{
    public function index()
    {
        $bodyAttributes = BodyAttribute::where('deleted_at', null)->get();

        return view('maintenance.bodyAttribute',['bodyAttributes'=>$bodyAttributes]);
    }
    
    public function getBodyAttribute(){
        $bodyAttribute = BodyAttribute::where('deleted_at', null)->get();
        
        return response()->json($bodyAttribute);
    }

    public function addBodyAttribute(Request $request){
        $vitalStatistics = new BodyAttribute;

        try {
            $vitalStatistics->strBodyAttributeName = $request->vitalStatistics;

            $vitalStatistics->save();

        } catch (Exception $e) {
            
        }
    }

    public function updateBodyAttribute(Request $request){
        try {
            BodyAttribute::where('intBodyAttributeID', $request->vitalStatisticsID)
            ->update(['strBodyAttributeName'=>$request->vitalStatistics]);
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
