<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TypeOfContract;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeOfContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $typeOfContracts = TypeOfContract::where('deleted_at', null)->get();

        return view('/maintenance/typeOfContract', ['typeOfContracts'=>$typeOfContracts]);
    }
    
    public function getTypeOfContract(){
        $typeOfContract = TypeOfContract::where('deleted_at', null)->get();
        
        return response()->json($typeOfContract);
    }
    
    public function addTypeOfContract(Request $request){
        try {

            $typeOfContract = new TypeOfContract;

            $typeOfContract->strTypeOfContractName = $request->strTypeOfContractName;
            $typeOfContract->strDescription = $request->strDescription;
            $typeOfContract->intMonthDuration = $request->intMonthDuration;
            
            $typeOfContract->save();

        } catch (Exception $e) {
            
        }
    }
    
    public function updateTypeOfContract(Request $request){
        try{
            TypeOfContract::where('intTypeOfContractID', $request->editTypeOfContractID)
            ->update(['strTypeOfContractName' => $request->editTypeOfContractName,
                    'strDescription' => $request->editDescription,
                     'intMonthDuration' => $request->editMonthDuration]);
        }catch (Exception $e){
            
        }
    }
    
    public function deleteTypeOfContract(Request $request){
        try {
            
			TypeOfContract::destroy($request->intTypeOfContractID);    
                
            
        } catch (Exception $e) {
            
        }
    }
    
    public function flagTypeOfContract(Request $request){
        try {
            TypeOfContract::where('intTypeOfContractID', $request->intTypeOfContractID)
            ->update(['boolFlag' => $request->boolFlag]);
        } catch (Exception $e) {
            
        }
    }
   
}
