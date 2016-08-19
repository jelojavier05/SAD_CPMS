<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $accountType = $request->session()->get('accountType');

        if ($accountType == 3){
            $countClient = DB::table('tblclient')
                ->where('deleted_at', null)
                ->count();
            $countGuard = DB::table('tblguard')
                ->where('deleted_at', null)
                ->count();
            $countGun = DB::table('tblgun')
                ->where('deleted_at', null)
                ->count();

            $value = new \stdClass();
            $value->countClient = $countClient;
            $value->countGuard = $countGuard;
            $value->countGun = $countGun;

             return view('/DashboardAdmin')
                ->with('value', $value);
        }else{
            return redirect('/userlogin');
        }
        
//        if ($request->session()->has('id')){
//        
//        }else{
//            return redirect('/userlogin');
//        }
       
    }
}
