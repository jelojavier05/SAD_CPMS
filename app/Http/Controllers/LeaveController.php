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

            $leave->strLeaveType = $request->strLeaveType;
            $leave->intLeaveCount = $request->intLeaveCount;
            $leave->intNotificationPeriod = $request->intNotificationPeriod;
            $leave->save();
            
        } catch (Exception $e) {
            
        }   
    }

    public function updateLeave(Request $request){
        
        try {
            Leave::where('intLeaveID', $request->editID)
            ->update(['strLeaveType'=>$request->editname, 
                'intLeaveCount'=>$request->editLeaveCount,
                'intNotificationPeriod'=>$request->editNotificationPeriod]);
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
