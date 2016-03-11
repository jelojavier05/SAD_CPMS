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

    public function addGovernmentExam(Request $request)
    {

        try {
            DB::table('tblgovernmentexam')
            ->insertGetId([
                'strGovernmentExam' => $request->input('governmentExamName'),
                'strDescription' => $request->input('governmentExamDescription')
            ]);
        } catch (Exception $e) {
             
        }
       
    }
    
    public function flagGovernmentExam(Request $request){
        try {

            DB::table('tblgovernmentexam')
                ->where('intGovernmentExamID', $request->input('governmentExamID'))
                ->update(['boolFlag' => $request->input('flag')]);
        } catch (Exception $e) {
            alert();
        }
    }

    public function updateGovernmentExam(Request $request){
        try {

            DB::table('tblgovernmentexam')
                ->where('intGovernmentExamID', $request->input('governmentExamID'))
                ->update(['strGovernmentExam' => $request->input('governmentExamName'),
                          'strDescription' => $request->input('governmentExamDescription')]);
        } catch (Exception $e) {
            alert();
        }
        
    }

    public function deleteGovernmentExam(Request $request){
        try {
//          DB::table('tblgovernmentexam')->where('intGovernmentExamID', $request->input('governmentExamID'))->destroy();
            GovernmentExam::destroy($request->governmentExamID);
        } catch (Exception $e) {
            
        }
    }
}
