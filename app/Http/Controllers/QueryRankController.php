<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class QueryRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/queries/rank');
    }

    public function getRank(){
		$result = DB::table('tblrank')
			->join('tblarmedservice', 'tblarmedservice.intArmedServiceID', '=', 'tblrank.intArmedServiceID')
			->select('tblrank.*', 'tblarmedservice.strArmedServiceName')
			->where('tblrank.deleted_at', null)
			->where('tblarmedservice.boolFlag', 1)
			->get();
		
//		dd($result);
		return response()->json($result);
	}
}
