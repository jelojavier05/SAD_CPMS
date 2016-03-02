<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\NatureOfBusiness;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NatureOfBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $natureOfBusinesses = NatureOfBusiness::where('deleted_at', null)->paginate(5);

        return view('/maintenance/natureOfBusiness', ['natureOfBusinesses'=>$natureOfBusinesses]);
    }

   public function addNatureOfBusiness(Request $request){
       try {

            $natureOfBusiness = new NatureOfBusiness;

            $natureOfBusiness->strNatureOfBusiness = $request->natureOfBusiness;
            
            $natureOfBusiness->save();

            return redirect()->route('natureOfBusinessIndex');
        } catch (Exception $e) {
            //alert
            alert();
        }
   }

   public function updateNatureOfBusiness(Request $request){
        try {
            NatureOfBusiness::where('intNatureOfBusinessID', $request->natureOfBusinessID)
            ->update(['strNatureOfBusiness'=>$request->natureOfBusiness]);
        } catch (Exception $e) {
            alert();
        }
        return redirect()->route('natureOfBusinessIndex');
    }

    public function deleteNatureOfBusiness(Request $request){
        try {
            if($request->okayCancelChecker == "okay"){
                $natureOfBusiness = NatureOfBusiness::destroy($request->natureOfBusinessID);    
                
            }
        } catch (Exception $e) {
            
        }

        return redirect()->route('natureOfBusinessIndex');  
         
    }
}
