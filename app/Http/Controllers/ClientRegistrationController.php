<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\NatureOfBusiness;
use App\Model\Client;
use App\Model\Province;
use App\Http\Controllers\Controller;
use Validator;
use DB;

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
            DB::beginTransaction();
            $accountID = DB::table('tblaccount')->insertGetId([
                'strUsername' => $request->username,
                'strPassword' => $request->password,
                'intAccountType' => 0
            ]);
            
            $id = DB::table('tblclient')->insertGetId([
                'intAccountID' => $accountID,
                'intNatureOfBusinessID' => $request->natureOfBusiness,
                'strClientName' => $request->clientName,
                'strContactNumber' => $request->clientContactNumber,
                'strPersonInCharge' => $request->personInCharge,
                'strPOICContactNumber' => $request->personContactNumber,
                'deciAreaSize' => $request->areaSize,
                'intPopulation' => $request->population
            ]);
            
            DB::table('tblclientaddress')->insert([
                'intClientID' => $id,
                'strAddress' => $request->strAddress,
                'intProvinceID' => $request->province,
                'intCityID' => $request->city
            ]);
            
            
            $array = array();
            $shiftNumber = $request->shiftNumber;
            $shiftFrom = $request->shiftFrom;
            $shiftTo = $request->shiftTo;

            for ($intLoop = 0; $intLoop < count($shiftNumber); $intLoop ++){
                DB::table('tblclientshift')->insert([
                    'intClientID' => $id,
                    'strShiftNumber' => $shiftNumber[$intLoop],
                    'timeFrom' => $shiftFrom[$intLoop],
                    'timeTo' => $shiftTo[$intLoop]
                ]);
            }
            
            $adminID = $request->session()->get('accountID');
            $inboxID = DB::table('tblinbox')->insertGetId([
                'intAccountIDSender' => $accountID,
                'intAccountIDReceiver' => $adminID,
                'strSubject' => 'New Client',
                'tinyintType' => 1
            ]);

            $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 8);
            $message = 'Welcome ' . $request->clientName . '. Please take note of this code "' . $code .'". This will be needed in finalization of your contract. Thank you.';
            $inboxID = DB::table('tblinbox')->insert([
                'intAccountIDSender' => $adminID,
                'intAccountIDReceiver' => $accountID,
                'strSubject' => 'New Client',
                'strMessage' => $message,
                'tinyintType' => 0
            ]);
            
            DB::table('tblclientpendingnotification')->insert([
                'intClientID' => $id,
                'intNumberOfGuard' => $request->guardNo,
                'intInboxID' => $inboxID,
                'strCode' => $code
            ]);
            
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}