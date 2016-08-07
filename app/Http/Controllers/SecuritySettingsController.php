<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SecuritySettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accountID = $request->session()->get('accountID');

        $guard = DB::table('tblguard')
            ->select('tblguard.strFirstName', 'tblguard.strLastName')
            ->where('intAccountID', $accountID)
            ->first();
        
        return view('/securityguard/SecuritySettings');
    }


}
