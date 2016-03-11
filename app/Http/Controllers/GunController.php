<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Gun;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$guns = Gun::where('deleted_at', null)->get();
        return view('/maintenance/addGun', ['guns'=>$guns]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }


    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }
	
	public function flag(Request $request)
	{
		
	}
}
