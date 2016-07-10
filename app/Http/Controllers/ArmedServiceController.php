<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ArmedService;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArmedServiceController extends Controller
{
    public function index(){
        $armedServices = ArmedService::where('deleted_at', null)->get();

        return view('/maintenance/armedservice', ['armedServices'=>$armedServices]);
    }
    
    public function getArmedService(){
        $armedServices = ArmedService::where('deleted_at', null)->get();
        
        return response()->json($armedServices);
    }

    public function addArmedService(Request $request){
        try {

            $armedService = new ArmedService;

            $armedService->strArmedServiceName = $request->armedServiceName;
            
            $armedService->save();

        } catch (Exception $e) {
            
        }

        
    }
	
	public function flagArmedService(Request $request){
       	try {
            ArmedService::where('intArmedServiceID', $request->armedServiceID)
            ->update(['boolFlag' => $request->flag]);
        } catch (Exception $e) {
            
        }
    }

    public function updateArmedService(Request $request){
        try {
            ArmedService::where('intArmedServiceID', $request->armedServiceID)
            ->update(['strArmedServiceName'=>$request->armedServiceName]);
        } catch (Exception $e) {
            
        }
        
    }

    public function deleteArmedService(Request $request){
        try {
            
			ArmedService::destroy($request->armedServiceID);    
                
            
        } catch (Exception $e) {
            
        }
         
    }
}
