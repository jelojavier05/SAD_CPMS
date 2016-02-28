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
        $leaves = Leave::where('deleted_at', null)->paginate(5);

        return view('maintenance.leave', ['leaves'=>$leaves]);
    }

    public function addLeave(Request $request)
    {

        try {
            $leave = new Leave;

            $leave->strLeaveType = $request->leaveType;
            $leave->intDefaultLeave = $request->defaultLeave;
            $leave->save();

        } catch (Exception $e) {
            //
            alert();
        }   

        return redirect()->route('leaveIndex');     
    }

    public function updateLeave(Request $request){
        
        try {
            Leave::where('intLeaveID', $request->editLeaveID)
            ->update(['strLeaveType'=>$request->editLeaveType, 
                'intDefaultLeave'=>$request->editDefaultLeave]);
        } catch (Exception $e) {
            alert();
        }
        return redirect()->route('leaveIndex');   
    }

}
