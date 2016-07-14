<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\NatureOfBusiness;
use App\Model\Client;
use App\Model\Province;
use App\Http\Controllers\Controller;
use Validator;


class ClientRegistrationController extends Controller
{
    public function index(){
        
        $natureOfBusinesses = NatureOfBusiness::where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        $provinces = Province::where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        return view('/clientAdmin/clientForm')
            ->with('natureOfBusinesses', $natureOfBusinesses)
            ->with('provinces', $provinces);
    }
    
    public function insert(Request $request){
        try {

            $client = new Client;

            $client->strClientName = $request->clientName;
            $client->strClientContactNumber = $request->clientContactNumber;
            $client->strPersonInCharge = $request->personInCharge;
            $client->strPersonContactNumber = $request->personContactNumber;
            $client->strSize = $request->personContactNumber;
            $client->intPopulation = $request->personContactNumber;
            $client->intNatureOfBusinessID = $request->natureOfBusiness;
            
            $client->save();

        } catch (Exception $e) {
            
        }
    }
}