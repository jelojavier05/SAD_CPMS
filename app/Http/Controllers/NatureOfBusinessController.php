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
    public function index(){
        $natureOfBusinesses = NatureOfBusiness::where('deleted_at', null)->get();

        return view('/maintenance/natureOfBusiness', ['natureOfBusinesses'=>$natureOfBusinesses]);
    }
    
    public function getNatureOfBusiness(){
        $natureOfBusiness = NatureOfBusiness::where('deleted_at', null)->get();
        
        return response()->json($natureOfBusiness);
    }

    public function addNatureOfBusiness(Request $request){
       try {

            $natureOfBusiness = new NatureOfBusiness;

            $natureOfBusiness->strNatureOfBusiness = $request->natureOfBusiness;
            
            $natureOfBusiness->save();

        } catch (Exception $e) {
            
        }
   }
	
	public function flagNatureOfBusiness(Request $request){
        try {
            NatureOfBusiness::where('intNatureOfBusinessID', $request->natureOfBusinessID)
            ->update(['boolFlag'=>$request->flag]);
        } catch (Exception $e) {
            alert();
        }
    }

    public function updateNatureOfBusiness(Request $request){
        try {
            NatureOfBusiness::where('intNatureOfBusinessID', $request->natureOfBusinessID)
            ->update(['strNatureOfBusiness'=>$request->natureOfBusiness]);
        } catch (Exception $e) {
            
        }
    }

    public function deleteNatureOfBusiness(Request $request){
        try {
            
			NatureOfBusiness::destroy($request->natureOfBusinessID);    
                
            
        } catch (Exception $e) {
            
        }

         
    }
}
