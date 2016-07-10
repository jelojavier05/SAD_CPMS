<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GovernmentExam;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class GovernmentExamController extends Controller
{
    public function index(){
        $governmentExams = GovernmentExam::where('deleted_at', null)->get();

        return view('/maintenance/governmentExam', ['governmentExams'=>$governmentExams]);
    }
	
	public function getGovernmentExam(){
		$governmentExams = GovernmentExam::where('deleted_at', null)->get();
		
		return response()->json($governmentExams);
	}

    public function addGovernmentExam(Request $request){

        try {
            $governmentExam = new GovernmentExam;

            $governmentExam->strGovernmentExam = $request->governmentExamName;
            
            $governmentExam->save();
        } catch (Exception $e) {
             
        }
       
    }
    
    public function flagGovernmentExam(Request $request){
        try {

            GovernmentExam::where('intGovernmentExamID', $request->governmentExamID)
            ->update(['boolFlag' => $request->flag]);
            
        } catch (Exception $e) {

        }
    }

    public function updateGovernmentExam(Request $request){
        try {
            GovernmentExam::where('intGovernmentExamID', $request->governmentExamID)
            ->update(['strGovernmentExam'=>$request->governmentExamName]);
        } catch (Exception $e) {

        }
        
    }

    public function deleteGovernmentExam(Request $request){
        try {
            GovernmentExam::destroy($request->governmentExamID);
        } catch (Exception $e) {
            
        }
    }
}
