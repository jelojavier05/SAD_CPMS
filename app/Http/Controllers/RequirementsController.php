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
    public function index(){
        $requirements = Requirements::where('deleted_at', null)->get();

        return view('/maintenance/requirements', ['requirements'=>$requirements]);
    }

    public function addRequirements(Request $request){
        try {

            $requirements = new Requirements;

            $requirements->strRequirements = $request->requirements;
            $requirements->strDescription = $request->requirementsDescription;
            $requirements->intIdentifier = $request->identifier;
            
            $requirements->save();

        
        } catch (Exception $e) {
            
        }

        
    }

    public function updateRequirements(Request $request){
        try {
            Requirements::where('intRequirementsID', $request->requirementsID)
            ->update(['strRequirements'=>$request->requirements, 
                'strDescription'=>$request->requirementsDescription,
                'intIdentifier'=>$request->identifier]);
        } catch (Exception $e) {

        }
    }

    public function deleteRequirements(Request $request){
        try {
            
            $requirements = Requirements::destroy($request->requirementsID);    
                
            
        } catch (Exception $e) {
            
        }
        
         
    }
    
    public function flagRequirements(Request $request){
        try {
            Requirements::where('intRequirementsID', $request->requirementID)
            ->update(['boolFlag' => $request->flag]);
        } catch (Exception $e) {
            
        }
    }
}
