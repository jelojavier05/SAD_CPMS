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
         $requirements = Requirements::where('deleted_at', null)->paginate(5);

        return view('/maintenance/requirements', ['requirements'=>$requirements]);
    }

    public function addRequirements(Request $request)
    {
        try {

            $requirements = new Requirements;

            $requirements->strRequirements = $request->requirements;
            $requirements->strDescription = $request->requirementsDescription;
            
            $requirements->save();

        return redirect()->route('requirementsIndex');
        } catch (Exception $e) {
            //alert
            alert();
        }

        
    }

    public function updateRequirements(Request $request){
        try {
            Requirements::where('intRequirementsID', $request->requirementsID)
            ->update(['strRequirements'=>$request->requirements, 
                'strDescription'=>$request->requirementsDescription]);
        } catch (Exception $e) {
            alert();
        }
        return redirect()->route('requirementsIndex');
    }

    public function deleteRequirements(Request $request){
        try {
            if($request->okayCancelChecker == "okay"){
                $requirements = Requirements::destroy($request->requirementsID);    
                
            }
        } catch (Exception $e) {
            
        }
        return redirect()->route('requirementsIndex');  
         
    }
}
