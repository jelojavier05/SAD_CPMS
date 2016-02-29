<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TypeOfGun;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeOfGunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeOfGuns = TypeOfGun::where('deleted_at', null)->paginate(5);

        return view('/maintenance/typeOfGUn', ['typeOfGuns'=>$typeOfGuns]);
    }

    public function addTypeOfGun(Request $request)
    {
        try {

            $typeOfGun = new ArmedService;

            $typeOfGun->strTypeOfGun = $request->typeOfGun;
            $typeOfGun->strDescription = $request->typeOfGunDescription;
            
            $typeOfGun->save();

        return redirect()->route('typeOfGunIndex');
        } catch (Exception $e) {
            //alert
            alert();
        }

        
    }

    public function updateTypeOfGun(Request $request){
        
    }

    public function deleteTypeOfGun(Request $request){
        try {
            if($request->okayCancelChecker == "okay"){
                $armedService = ArmedService::destroy($request->armedServiceID);    
                return redirect()->route('armedServiceIndex');  
            }
        } catch (Exception $e) {
            
        }
         
    }
}
