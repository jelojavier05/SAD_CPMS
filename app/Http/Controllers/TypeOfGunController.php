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
        $typeOfGuns = TypeOfGun::where('deleted_at', null)->get();

        return view('/maintenance/typeOfGUn', ['typeOfGuns'=>$typeOfGuns]);
    }

    public function addTypeOfGun(Request $request)
    {
        try {

            $typeOfGun = new TypeOfGun;

            $typeOfGun->strTypeOfGun = $request->typeOfGun;
            $typeOfGun->strDescription = $request->typeOfGunDescription;
            
            $typeOfGun->save();

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
	
	public function flagTypeOfGun(Request $request){
        try {
            TypeOfGun::where('intTypeOfGunID', $request->typeOfGunID)
            ->update(['boolFlag'=>$request->flag]);
        } catch (Exception $e) {
            alert();
        }
    }

    public function deleteTypeOfGun(Request $request){
        try {
            
			TypeOfGun::destroy($request->typeOfGunID);    
                
            
        } catch (Exception $e) {
            
        }

        return redirect()->route('typeOfGunIndex');  
         
    }
}
