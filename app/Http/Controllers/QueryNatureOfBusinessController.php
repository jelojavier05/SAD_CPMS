<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class QueryNatureOfBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/queries/natureOfBusiness');
    }

    public function getNatureOfBusiness(){
		$result = DB::table('tblnatureofbusiness')
			->select('*')
			->where('deleted_at', null)
			->get();
//		dd($result); for network F12 testing
		
		return response()->json($result);
	}
}
