<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Province;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ProvinceController extends Controller
{
    
    public function index(){
        $provinces = Province::where('deleted_at', null)->get();
        return view('/maintenance/province')
            ->with('provinces', $provinces);
    }
    
    public function get(){
        $provinces = Province::where('deleted_at', null)->get();
        
        return response()->json($provinces);
    }
    
    public function create(Request $request){
        try {

            $province = new Province;

            $province->strProvinceName = $request->strProvinceName;
            
            $province->save();

        } catch (Exception $e) {
            
        }
    }
    
    public function update(Request $request){
        try {
            Province::where('intProvinceID', $request->intProvinceID)
            ->update(['strProvinceName'=>$request->strProvinceName]);
        } catch (Exception $e) {
            
        }
    }
    
    public function delete(Request $request){
        try {
			Province::destroy($request->intProvinceID);    
        } catch (Exception $e) {
            
        }
    }
    
    public function flag(Request $request){
       	try {
            Province::where('intProvinceID', $request->intProvinceID)
            ->update(['boolFlag' => $request->flag]);
        } catch (Exception $e) {
            
        }
    }
}