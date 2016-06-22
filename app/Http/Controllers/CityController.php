<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\Province;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    
    public function index(){
        $provinces = Province::where('deleted_at', null)->get();
        $cities = City::where('deleted_at', null)->get();
        
        return view('/maintenance/city')
            ->with ('provinces', $provinces)
            ->with ('cities', $cities);
    }
    
    public function get(){
        $cities = City::where('deleted_at', null)->get();
        
        return response()->json($cities);
    }
    
    public function create(Request $request){
        try {

            $city = new City;

            $city->strCityName = $request->strCityName;
            $city->intProvinceID = $request->intProvinceID;
            
            $city->save();

        } catch (Exception $e) {
            
        }
    }
    
    public function update(Request $request){
        try {
            City::where('intCityID', $request->intCityID)
            ->update(['strCityName'=>$request->strCityName,
                     'intProvinceID'=>$request->intProvinceID]);
        } catch (Exception $e) {
            
        }
    }
    
    public function delete(Request $request){
        try {
			City::destroy($request->intCityID);    
        } catch (Exception $e) {
            
        }
    }
    
    public function flag(Request $request){
       	try {
            City::where('intCityID', $request->intCityID)
            ->update(['boolFlag' => $request->flag]);
        } catch (Exception $e) {
            
        }
    }
}
