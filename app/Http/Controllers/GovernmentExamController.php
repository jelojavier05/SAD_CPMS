<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GovernmentExam;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GovernmentExamController extends Controller
{
    public function index(){
        $governmentExams = GovernmentExam::where('bitFlag', 1)
        ->get();

        return view('/maintenance/governmentExam', ['governmentExams'=>$governmentExams]);
    }

    public function addGovernmentExam(Request $request)
    {
        $governmentExam = new GovernmentExam;

        $governmentExam->strGovernmentExam = $request->governmentExamName;

        $governmentExam->save();

        return redirect()->route('governmentExamIndex');
    }
}
