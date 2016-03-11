<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class LeaveController extends Controller
{
    
    public function index()
    {
        $leaves = Leave::where('deleted_at', null)->get();

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
	
	public function flagLeave(Request $request){
        
        try {
            Leave::where('intLeaveID', $request->leaveID)
            ->update(['boolFlag'=>$request->flag]);
        } catch (Exception $e) {
            alert();
        }  
    }

    public function deleteLeave(Request $request){
        try {
            
			Leave::destroy($request->leaveID);    
                
        } catch (Exception $e) {
            
        }
        return redirect()->route('leaveIndex');  
         
    }
}
