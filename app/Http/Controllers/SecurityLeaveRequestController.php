<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SecurityLeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accountID = $request->session()->get('accountID');
        $arrLeaveID = DB::table('tblleave')->get();
        $guardInformation = DB::table('tblguard')
            ->select('intGuardID', 'strFirstName', 'strLastName')
            ->where('intAccountID', $accountID)
            ->first();

        $guardLeave = array();

        foreach($arrLeaveID as $value){
            $result = DB::table('tblguardleave')
                ->join('tblleave', 'tblleave.intLeaveID', '=','tblguardleave.intLeaveID')
                ->select('tblguardleave.*', 'tblleave.strLeaveType')
                ->where('intGuardID',$guardInformation->intGuardID)
                ->where('tblguardleave.intLeaveID',$value->intLeaveID)
                ->orderBy('intGuardLeaveID','desc')
                ->first();
            $result->intNotificationPeriod = $value->intNotificationPeriod;
            if (!is_null($result)){
                array_push($guardLeave, $result);    
            }
        }

        return view('/securityguard/SecurityLeaveRequest')
            ->with('guardInformation', $guardInformation)
            ->with('guardLeave', $guardLeave);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
