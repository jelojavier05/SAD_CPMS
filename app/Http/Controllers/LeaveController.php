<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;


class LeaveController extends Controller
{
    
    public function index(){
        $leaves = Leave::where('deleted_at', null)->get();

        return view('maintenance.leave', ['leaves'=>$leaves]);
    }

    public function getLeave(){
        $leaves = Leave::where('deleted_at', null)->get();
        
        return response()->json($leaves);
    }
    
    public function addLeave(Request $request){
        try {
            $leave = new Leave;

            $leave->strLeaveType = $request->leaveType;
            $leave->intDaysDuration = $request->daysDuration;
            $leave->intCountLeave = $request->countLeave;
            $leave->intDaysBeforeLeave = $request->daysBeforeLeave;
            $leave->save();
            
        } catch (Exception $e) {
            
        }   
    }

    public function updateLeave(Request $request){
        
        try {
            Leave::where('intLeaveID', $request->editLeaveID)
            ->update(['strLeaveType'=>$request->editname, 
                'intDaysDuration'=>$request->editDaysDuration,
                'intCountLeave'=>$request->editNumberOfRequest,
                'intDaysBeforeLeave'=>$request->editNotificationPeriod]);
        } catch (Exception $e) {
            
        }
    }
	
	public function flagLeave(Request $request){
        
        try {
            Leave::where('intLeaveID', $request->leaveID)
            ->update(['boolFlag'=>$request->flag]);
        } catch (Exception $e) {
            
        }  
    }

    public function deleteLeave(Request $request){
        try {
            
			Leave::destroy($request->leaveID);    
                
        } catch (Exception $e) {
            
        }  
    }
    
    
}
