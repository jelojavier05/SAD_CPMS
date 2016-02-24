<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ArmedService;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArmedServiceController extends Controller
{
    public function index()
    {
        $armedServices = ArmedService::where('bitFlag', 1)
        ->get();

        return view('/maintenance/armedservice', ['armedServices'=>$armedServices]);
    }

    public function addArmedService(Request $request)
    {
        $armedService = new ArmedService;

        $armedService->strArmedServiceName = $request->armedServiceName;
        $armedService->strDescription = $request->armedServiceDescription;
        
        $armedService->save();

        return redirect()->route('armedServiceIndex');
    }

    public function updateArmedService(Request $request){
        
        
        ArmedService::where('intArmedServiceID', $request->armedServiceID)
        ->update(['strArmedServiceName'=>$request->armedServiceName, 
            'strDescription'=>$request->armedServiceDescription]);


        return redirect()->route('armedServiceIndex');
    }
}
