<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Input;

class SecurityChangeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){   

        $id = $request->session()->get('id');
        $now = Carbon::now();
        
        $guard = DB::table('tblguard')
            ->join('tblguardstatus', 'tblguardstatus.intGuardID', '=', 'tblguard.intGuardID')
            ->select('tblguardstatus.intStatusIdentifier')
            ->where('tblguard.intGuardID', '=', $id)
            ->where('tblguardstatus.dateEffectivity','<=', $now)
            ->orderBy('tblguardstatus.dateEffectivity', 'desc')
            ->first();
        
        if ($guard->intStatusIdentifier == 2 || $guard->intStatusIdentifier == 3){
            $clientID = DB::table('tblclientguard')
                ->join('tblcontract', 'tblcontract.intContractID', '=', 'tblclientguard.intContractID')
                ->select('tblcontract.intClientID')
                ->where('tblclientguard.intGuardID', $id)
                ->where('tblclientguard.boolStatus', 1)
                ->where('tblclientguard.created_at', '<=', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();
            
            $clients = DB::table('tblclient')
                ->join('tblnatureofbusiness', 'tblnatureofbusiness.intNatureOfBusinessID', '=','tblclient.intNatureOfBusinessID')
                ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
                ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblclientaddress.intProvinceID')
                ->join('tblcity','tblcity.intCityID','=','tblclientaddress.intCityID')
                ->select('tblclient.intClientID','tblclient.strClientName' ,'tblclient.strContactNumber','tblnatureofbusiness.strNatureOfBusiness', 'tblprovince.strProvinceName', 'tblcity.strCityName')
                ->where('tblclient.intStatusIdentifier', 2)
                ->where('tblclient.intClientID', '<>', $clientID->intClientID)
                ->get();
            return view('/securityguard/SecurityChangeLocation')
                ->with('clients', $clients);
        }else{
            return redirect('/securityHome');
        }    
    }

    public function getClientActiveGuards(Request $request){
        $clientID = Input::get('clientID');
        $now = Carbon::now();

        $contract = DB::table('tblcontract')
            ->select('intContractID')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
            ->first();
        
        $guardID = DB::table('tblclientguard')
            ->select('intGuardID')
            ->where('intContractID', $contract->intContractID)
            ->groupBy('intGuardID')
            ->get();

        $clientGuard = array();
        foreach($guardID as $value){
            $result = DB::table('tblcontract')    
                ->join('tblclientguard', 'tblclientguard.intContractID', '=', 'tblcontract.intContractID')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->join('tblguardaddress', 'tblguardaddress.intGuardID','=','tblguard.intGuardID')
                ->join('tblprovince','tblprovince.intProvinceID','=','tblguardaddress.intProvinceID')
                ->join('tblcity','tblcity.intCityID','=','tblguardaddress.intCityID')
                ->select('tblguard.strFirstName','tblguard.strLastName', 'tblguard.intGuardID','tblprovince.strProvinceName','tblcity.strCityName', 'tblclientguard.boolStatus')
                ->where('tblclientguard.intGuardID', $value->intGuardID)
                ->where('tblclientguard.intContractID', $contract->intContractID)
                ->where('tblclientguard.created_at', '<=', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            $countLeaveRequestActive = DB::table('tblguardleaverequest')
                ->where('intGuardID', $value->intGuardID)
                ->where('boolStatus', 1)
                ->count();

            $guard = DB::table('tblguard')
                ->join('tblguardstatus', 'tblguardstatus.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguardstatus.intStatusIdentifier')
                ->where('tblguard.intGuardID', '=', $value->intGuardID)
                ->where('tblguardstatus.dateEffectivity','<=', $now)
                ->orderBy('tblguardstatus.dateEffectivity', 'desc')
                ->first();

            $hasAnotherClientInFuture = DB::table('tblclientguard')
                ->where('created_at', '>', $now)
                ->where('boolStatus', 1)
                ->where('intGuardID', $value->intGuardID)
                ->count();

            if (!is_null($result) && $result->boolStatus == 1 && $guard->intStatusIdentifier == 2 && $countLeaveRequestActive == 0 && $hasAnotherClientInFuture == 0){   
                //first - kung active siya dun sa client na yon
                //second - kung nakadeploy ba talaga siya at hindi lang siya reliever
                //third - kung wala siyang pending na request leave
                array_push($clientGuard, $result);
            }
        }

        return response()->json($clientGuard);
    }

    public function hasPendingRequest(Request $request){
        $id = $request->session()->get('id');

        $clientGuardID = DB::table('tblclientguard')
            ->select('intClientGuardID')
            ->where('intGuardID', $id)
            ->where('boolStatus', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        $result = DB::table('tblswaprequest')
            ->where('intClientGuardSenderID', $clientGuardID->intClientGuardID)
            ->where('boolStatus', 1)
            ->count();
        
        if ($result > 0){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function sendRequest(Request $request){
        $guardIDReceiver = $request->guardIDSelected;
        $guardIDSender = $request->session()->get('id');

        try{
            DB::beginTransaction();

            $clientGuardIDSender = DB::table('tblclientguard')
                ->select('intClientGuardID')
                ->where('intGuardID', $guardIDSender)
                ->where('boolStatus', 1)
                ->orderBy('created_at', 'desc')
                ->first();

            $clientGuardIDReceiver = DB::table('tblclientguard')
                ->select('intClientGuardID')
                ->where('intGuardID', $guardIDReceiver)
                ->where('boolStatus', 1)
                ->orderBy('created_at', 'desc')
                ->first();

            $accountIDSender = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $guardIDSender)
                ->first();

            $accountIDReceiver = DB::table('tblguard')
                ->select('intAccountID')
                ->where('intGuardID', $guardIDReceiver)
                ->first();

            $subject = 'Swap Request';
            $inboxID = DB::table('tblinbox')->insertGetId([
                'intAccountIDSender' => $accountIDSender->intAccountID,
                'intAccountIDReceiver' => $accountIDReceiver->intAccountID,
                'strSubject' => $subject,
                'tinyintType' => 8
            ]);

            DB::table('tblswaprequest')->insert([
                'intClientGuardSenderID' => $clientGuardIDSender->intClientGuardID,
                'intClientGuardReceiverID' => $clientGuardIDReceiver->intClientGuardID,
                'intInboxID' => $inboxID,
            ]);

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
