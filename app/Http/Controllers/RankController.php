<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ArmedService;
use App\Model\Rank;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $armedServices = ArmedService::where('deleted_at', null)
            ->orderBy('strArmedServiceName', 'asc')
            ->get();
        
        $ranks = Rank::where('deleted_at', null)
            ->get();
        
        return view ('maintenance.rank')
            ->with('armedServices', $armedServices)
            ->with('ranks', $ranks);
    }
    
    public function get(){
        $ranks = Rank::where('deleted_at', null)->get();
        
        return response()->json($ranks);
    }
    
    public function create(Request $request){
        try {

            $rank = new Rank;

            $rank->strRank = $request->rank;
            $rank->intArmedServiceID = $request->asID;
            
            $rank->save();

        } catch (Exception $e) {
            
        }
    }
    
    public function update(Request $request){
        try {
            Rank::where('intRankID', $request->id)
            ->update(['strRank'=>$request->rank,
                     'intArmedServiceID'=>$request->asID]);
        } catch (Exception $e) {
            
        }
    }
    
    public function delete(Request $request){
        try {
			Rank::destroy($request->id);    
        } catch (Exception $e) {
            
        }
    }
    
    public function flag(Request $request){
        try {
            Rank::where('intRankID', $request->id)
            ->update(['boolFlag' => $request->flag]);
        } catch (Exception $e) {
            
        }
    }

}
