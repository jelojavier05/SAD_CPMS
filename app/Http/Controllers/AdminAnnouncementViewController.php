<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
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

    public function get(Request $request){
    	$announcement = DB::table('tblannouncement')
    		->select('*')
    		->where('boolStatus', 1)
    		->orderBy('datetimeCreated', 'desc')
    		->get();

    	foreach($announcement as $value){
    		$value->dateFormatedCreated = date('M-d-Y h:ia', strtotime($value->datetimeCreated)); 	
    	}
    	return response()->json($announcement);
    }

    public function create(Request $request){
    	DB::table('tblannouncement')
    		->insert([
    			'strSubject' => $request->strSubject,
    			'strMessage' => $request->strMessage
    		]);
    }

    public function update(Request $request){
    	$id = Input::get('announcementID');

    	DB::table('tblannouncement')
    		->where('intAnnouncementID', $id)
    		->update([
    			'strSubject' => $request->strSubject,
    			'strMessage' => $request->strMessage
    		]);
    }
}