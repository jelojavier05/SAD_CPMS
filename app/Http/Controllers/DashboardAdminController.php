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
    public function index(Request $request)
    {
        $accountType = $request->session()->get('accountType');

        if ($accountType == 3){
             return view('/DashboardAdmin');
        }else{
            return redirect('/userlogin');
        }
        
//        if ($request->session()->has('id')){
//        
//        }else{
//            return redirect('/userlogin');
//        }
       
    }

    public function getCountClient(Request $request){
        $countClient = DB::table('tblclient')
            ->where('deleted_at', null)
            ->count();
        
        return response()->json($countClient);
            
    }
    
    public function getCountGuard(Request $requst){
        $countGuard = DB::table('tblguard')
            ->where('deleted_at', null)
            ->count();
        
        return response()->json($countGuard);
    }
}
