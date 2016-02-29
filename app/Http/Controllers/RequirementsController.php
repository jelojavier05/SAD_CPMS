<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Requirements;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RequirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $requirements = TypeOfGun::where('deleted_at', null)->paginate(5);

        return view('/maintenance/typeOfGUn', ['requirements'=>$requirements]);
    }

    public function addTypeOfGun(Request $request)
    {
        try {

            $typeOfGun = new TypeOfGun;

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
        try {
            TypeOfGun::where('intTypeOfGunID', $request->typeOfGunID)
            ->update(['strTypeOfGun'=>$request->typeOfGun, 
                'strDescription'=>$request->typeOfGunDescription]);
        } catch (Exception $e) {
            alert();
        }
        return redirect()->route('typeOfGunIndex');
    }

    public function deleteTypeOfGun(Request $request){
        try {
            if($request->okayCancelChecker == "okay"){
                $typeOfGun = TypeOfGun::destroy($request->typeOfGunID);    
                return redirect()->route('typeOfGunIndex');  
            }
        } catch (Exception $e) {
            
        }
         
    }
}
