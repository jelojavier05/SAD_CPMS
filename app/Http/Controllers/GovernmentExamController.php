<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GovernmentExam;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GovernmentExamController extends Controller
{
    public function index(){
        $governmentExams = GovernmentExam::where('deleted_at', null)->get();

        return view('/maintenance/governmentExam', ['governmentExams'=>$governmentExams]);
    }

    public function addGovernmentExam(Request $request)
    {


        $governmentExam = new GovernmentExam;

        try {
            $governmentExam->strGovernmentExam = $request->governmentExamName;
            $governmentExam->strDescription = $request->governmentExamDescription;

            $governmentExam->save();
            
        } catch (Exception $e) {
            alert();
        }

        

        return redirect()->route('governmentExamIndex');
    }

    public function updateGovernmentExam(Request $request){
        try {

            GovernmentExam::where('intGovernmentExamID', $request->governmentExamID)
            ->update(['strGovernmentExam'=>$request->governmentExam,
                'strDescription'=>$request->governmentExamDescription]);    
        } catch (Exception $e) {
            alert();
        }

        return redirect()->route('governmentExamIndex');
    }

    public function deleteGovernmentExam(Request $request){
        try {
            if($request->okayCancelChecker == "okay"){
                $governmentExam = GovernmentExam::destroy($request->governmentExamID);    
                
            }
        } catch (Exception $e) {
            
        }
         
         return redirect()->route('governmentExamIndex');  
    }
}
