<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GovernmentExam;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GovernmentExamController extends Controller
{
    public function index(){
        $governmentExams = GovernmentExam::where('deleted_at', null)->paginate(5);

        return view('/maintenance/governmentExam', ['governmentExams'=>$governmentExams]);
    }

    public function addGovernmentExam(Request $request)
    {


        $governmentExam = new GovernmentExam;

        try {
            $governmentExam->strGovernmentExam = $request->governmentExamName;

            $governmentExam->save();
            
        } catch (Exception $e) {
            alert();
        }

        

        return redirect()->route('governmentExamIndex');
    }

    public function updateGovernmentExam(Request $request){
        GovernmentExam::where('intGovernmentExamID', $request->governmentExamID)
        ->update(['strGovernmentExam'=>$request->governmentExam]);


        return redirect()->route('governmentExamIndex');
    }
}
