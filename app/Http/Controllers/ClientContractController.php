<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Carbon\Carbon;


class ClientContractController extends Controller
{
    
    public function index(){
        $contract = DB::table('tbltypeofcontract')
            ->select('*')
            ->where('deleted_at', null)
            ->where('boolFlag', 1)
            ->get();
        
        return view('/clientAdmin/clientContract')
            ->with('contract', $contract); 
    }
    
    public function getClientDetail(Request $request){
        if ($request->session()->has('contractClientID')){
            $id = $request->session()->get('contractClientID');
            
            $client = DB::table('tblclient')
                ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=', 'tblclient.intNatureOfBusinessID')
                ->join('tblclientaddress', 'tblclientaddress.intClientID','=', 'tblclient.intClientID')
                ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
                ->join('tblcity', 'tblcity.intCityID', '=', 'tblclientaddress.intCityID')
                ->select('tblnatureofbusiness.strNatureOfBusiness', 'tblclient.*', 'tblclientaddress.strAddress', 'tblprovince.strProvinceName', 'tblcity.strCityName', 'tblnatureofbusiness.deciRate')
                ->where('tblclient.intClientID', $id)
                ->first();
            
            $shifts = DB::table('tblclientshift')
                ->join('tblclient', 'tblclient.intClientID', '=', 'tblclientshift.intClientID')
                ->select('tblclientshift.*')
                ->where('tblclient.intClientID', $id)
                ->get();
            
            $client->shifts = $shifts;
            
            return response()->json($client);    
        }
    }
    
    public function getGuardAccepted(Request $request){
        if ($request->session()->has('contractClientID')){
            $id = $request->session()->get('contractClientID');
            $guards = DB::table('tblclient')
                ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
                ->join('tblguardpendingnotification', 'tblguardpendingnotification.intClientPendingID', '=', 'tblclientpendingnotification.intClientPendingID')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
                ->select('tblguard.strFirstName', 'tblguard.strLastName')
                ->where('tblclient.intClientID', '=', $id)
                ->where('tblguardpendingnotification.intStatusIdentifier', '=', 3)
                ->get();

            return response()->json($guards);    
        }
    }
    
    public function getGunTagged(Request $request){
        $gunTagged = $request->session()->get('gunTagged');
        
        return response()->json($gunTagged);
    }
    
    public function postContract(Request $request){
        try{
            DB::beginTransaction();
            $now = Carbon::now();
            $clientID = $request->clientID;
            $guns = $request->session()->get('gunTagged');
            
            //shift
            $shift = array();
            $shiftNumber = $request->shiftNumber;
            $shiftFrom = $request->shiftFrom;
            $shiftTo = $request->shiftTo;
            
            for ($intLoop = 0; $intLoop < count($shiftNumber); $intLoop ++){
                $value = new \stdClass();
                $value->number = $shiftNumber[$intLoop];
                $value->from = $shiftFrom[$intLoop];
                $value->to = $shiftTo[$intLoop];

                array_push($shift,$value);
            }
            // end shift
            $guardID = DB::table('tblclient')
                ->join('tblclientpendingnotification', 'tblclientpendingnotification.intClientID', '=', 'tblclient.intClientID')
                ->join('tblguardpendingnotification', 'tblguardpendingnotification.intClientPendingID', '=', 'tblclientpendingnotification.intClientPendingID')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblguardpendingnotification.intGuardID')
                ->join('tblaccount', 'tblaccount.intAccountID', '=', 'tblguard.intAccountID')
                ->where('tblclient.intClientID', '=', $clientID)
                ->where('tblguardpendingnotification.intStatusIdentifier','=', 3)
                ->select('tblguard.intGuardID', 'tblaccount.intAccountID')
                ->get();
            
            $contractID = DB::table('tblcontract')->insertGetId([
                'intTypeOfContractID' => $request->contractID, 
                'intClientID' => $clientID,
                'intMonthsDuration' => $request->duration,
                'deciRate' => $request->rate,
                'dateStart' => $request->dateStart,
                'dateEnd' => $request->dateEnd
            ]);
            
            $guardPerShift = count($guardID)/count($shift);
            $shiftCounter = 0;
            $counter = 0;
            
            foreach($guardID as $value){
                $message = 'You are now assigned to ' . $request->clientName . 
                    ' at ' . $request->address . '. Your shift starts on '. date('Y-M-d', strtotime($request->dateStart)) .  ' from '. $shift[$shiftCounter]->from . ' to ' . $shift[$shiftCounter]->to . '.';   
                
                DB::table('tblclientguard')->insert([
                    'intContractID' => $contractID,
                    'intGuardID' => $value->intGuardID,
                    'created_at' => $now
                ]);
                
                DB::table('tblguard')
                    ->where('intGuardID', $value->intGuardID)
                    ->update(['intStatusIdentifier' => 2]);    
                
                DB::table('tblinbox')->insert([
                    'intAccountID' => $value->intAccountID,
                    'strMessage' => $message,
                    'datetimeSend' => $now,
                    'strSubject' => 'New Client Update'    
                ]);
                
                $counter ++;
                
                if ($counter == $guardPerShift){
                    $counter = 0;
                    $shiftCounter ++;
                }   
            }
            
            foreach($guns as $value){
                DB::table('tblclientgun')->insert([
                    'intContractID' => $contractID,
                    'intGunID' => $value->gunID,
                    'intRound' => $value->rounds,
                    'created_at' => $now
                ]);
                
                DB::table('tblgun')
                    ->where('intGunID', $value->gunID)
                    ->update(['boolFlag' => 2]);
            }
            
            DB::table('tblclient')
                ->where('intClientID', $clientID)
                ->update(['intStatusIdentifier' => 2]);
            
            
            DB::table('tblclientpendingnotification')
                ->where('intClientID', '=', $clientID)
                ->update([
                   'intStatusIdentifier' => 0 
                ]);
            
            
            $clientAccount = DB::table('tblaccount')
                ->join('tblclient', 'tblclient.intAccountID', '=', 'tblaccount.intAccountID')
                ->where('tblclient.intClientID', '=', $clientID)
                ->select('tblaccount.intAccountID')
                ->first();
            
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
    
}