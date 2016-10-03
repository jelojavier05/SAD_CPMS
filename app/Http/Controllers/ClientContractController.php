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
            
            $shift = DB::table('tblclientshift')
                ->join('tblclient', 'tblclient.intClientID', '=', 'tblclientshift.intClientID')
                ->select('tblclientshift.*')
                ->where('tblclient.intClientID', $id)
                ->get();
            
            foreach($shift as $value){
                $value->from = date('h:i A', strtotime($value->timeFrom)); 
                $value->to = date('h:i A', strtotime($value->timeTo)); 
            }

            $client->shifts = $shift;

            
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
                ->where('tblguardpendingnotification.intStatusIdentifier', '=', 2)
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

            //cgrm
            $username = $request->username;
            $password = $request->password;
            
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
                ->where('tblguardpendingnotification.intStatusIdentifier','=', 2)
                ->select('tblguard.intGuardID', 'tblaccount.intAccountID')
                ->get();
            
            $contractID = DB::table('tblcontract')->insertGetId([
                'intTypeOfContractID' => $request->contractID, 
                'intClientID' => $clientID,
                'intMonthsDuration' => $request->duration,
                'dateStart' => $request->dateStart,
                'dateEnd' => $request->dateEnd
            ]);

            DB::table('tblcontractrate')->insert([
                'intContractID' => $contractID,
                'deciRate' => $request->rate,
            ]);
            
            $guardPerShift = count($guardID)/count($shift);
            $shiftCounter = 0;
            $counter = 0;
            
            $accountClientID = $request->session()->get('accountID');
            foreach($guardID as $value){
                $message = 'You are now assigned to ' . $request->clientName . 
                    ' at ' . $request->address . '. Your shift starts on '. date('Y-M-d', strtotime($request->dateStart)) .  ' from '. $shift[$shiftCounter]->from . ' to ' . $shift[$shiftCounter]->to . '.';   
                
                DB::table('tblclientguard')->insert([
                    'intContractID' => $contractID,
                    'intGuardID' => $value->intGuardID,
                    'created_at' => $request->dateStart
                ]);
                
                DB::table('tblguardstatus')    
                    ->insert([
                        'intGuardID' => $value->intGuardID,
                        'intStatusIdentifier' => 2,
                        'dateEffectivity' => $request->dateStart
                    ]);
                
                DB::table('tblinbox')->insert([
                    'intAccountIDReceiver' => $value->intAccountID,
                    'intAccountIDSender' => $accountClientID,
                    'strMessage' => $message,
                    'strSubject' => 'New Client Update',
                    'tinyintType' => 0
                ]);
                
                $counter ++;
                
                if ($counter == $guardPerShift){
                    $counter = 0;
                    $shiftCounter ++;
                }   
            }//guards
            
            $gunOrderHeaderID = DB::table('tblgunorderheader')->insertGetId([
                'intClientID' => $clientID,
                'created_at' => $now
            ]);
            
            foreach($guns as $value){
                DB::table('tblgunorderdetail')->insert([
                    'intGunOrderHeaderID' => $gunOrderHeaderID,
                    'intGunID' => $value->gunID,
                    'intRounds' => $value->rounds,
                ]);
                
                DB::table('tblgun')
                    ->where('intGunID', $value->gunID)
                    ->update(['boolFlag' => 3]);
            }//gun
            
            DB::table('tblclient')
                ->where('intClientID', $clientID)
                ->update(['intStatusIdentifier' => 2]);//client update
            
            
            DB::table('tblclientpendingnotification')
                ->where('intClientID', '=', $clientID)
                ->update(['intStatusIdentifier' => 0]);//
            
            $clientAccount = DB::table('tblaccount')
                ->join('tblclient', 'tblclient.intAccountID', '=', 'tblaccount.intAccountID')
                ->where('tblclient.intClientID', '=', $clientID)
                ->select('tblaccount.intAccountID')
                ->first();
            
            DB::table('tblaccount')
                ->where('intAccountID', '=', $clientAccount->intAccountID)
                ->update(['intAccountType' => 1]);
            
            $cgrmAccountID = DB::table('tblaccount')
                ->insertGetId([
                    'strUsername' => $username,
                    'strPassword' => $password,
                    'intAccountType' => 4
                ]);

            DB::table('tblcgrm')
                ->insert([
                    'intAccountID' => $cgrmAccountID,
                    'intClientID' => $clientID
                ]);

            $arrDate = $request->arrDate;
            $checker = true;
            $status = 0;
            foreach($arrDate as $value){
                if ($checker){
                    $checker = false;
                }else{
                    $status = 1;
                }
                DB::table('tblclientbillingdate')->insert([
                    'intContractID' => $contractID,
                    'boolStatus' => $status,
                    'dateBill' => $value
                ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}