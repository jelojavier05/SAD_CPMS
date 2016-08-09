<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminAnnouncementViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('/AdminAnnouncementView');
    }

    public function create(Request $request){
    	DB::table('tblannouncement')
    		->insert([
    			'strSubject' => $request->strSubject,
    			'strMessage' => $request->strMessage
    		]);
    }
}