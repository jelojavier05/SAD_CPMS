<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;

class ClientInboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/client/ClientInbox1');
    }

    public function getSwapGuardRequestAccepted(Request $request){
    	$inboxID = Input::get('inboxID');

    	$swapGuardHeaderDetail =  DB::table('tblinbox')
    		->join('tblswapguardrequestinbox','tblswapguardrequestinbox.intInboxID', '=' ,'tblinbox.intInboxID')
    		->join('tblswapguardrequestheader','tblswapguardrequestheader.intSwapGuardHeaderID', '=' ,'tblswapguardrequestinbox.intSwapGuardHeaderID')
    		->select('tblswapguardrequestheader.strReason', 'tblswapguardrequestheader.intSwapGuardHeaderID', 'tblinbox.strMessage')
    		->where('tblinbox.intInboxID', $inboxID)
    		->first();

    	$arrGuard = DB::table('tblswapguardresponse')
    		->join('tblguard', 'tblguard.intGuardID', '=', 'tblswapguardresponse.intGuardID')
    		->join('tblguardaddress', 'tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
    		->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblguardaddress.intProvinceID')
    		->join('tblcity', 'tblcity.intCityID', '=', 'tblguardaddress.intCityID')
    		->select('tblguard.strFirstName', 'tblguardaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblguard.strLastName', 'tblguard.strGender')
    		->where('tblswapguardresponse.intSwapGuardHeaderID', $swapGuardHeaderDetail->intSwapGuardHeaderID)
    		->get();

    	$swapGuardHeaderDetail->guards = $arrGuard;

    	return response()->json($swapGuardHeaderDetail);

    }

}
