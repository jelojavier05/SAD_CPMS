<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::get();

        return view('maintenance.leave', ['leaves'=>$leaves]);
    }

    public function addLeave(Request $request)
    {
        $leave = new Leave;

        $leave->strLeaveType = $request->leaveType;
        $leave->intDefaultLeave = $request->defaultLeave;

        $leave->save();

        return redirect()->route('leaveIndex');
    }

    public function updateLeave(Request $request){
        Leave::where('intLeaveID', $request->leaveID)
        ->update(['strLeaveType'=>$request->leaveType, 
            'intDefaultLeave'=>$request->defaultLeave]);

        return redirect()->route('leaveIndex');   
    }

}
