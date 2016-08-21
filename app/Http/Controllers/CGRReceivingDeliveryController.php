<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;

class CGRReceivingDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('/CGR/CGRReceivingDelivery');
    }

    public function getDelivery(Request $request){
        $id = $request->session()->get('id');

        $result = DB::table('tblcgrm')
            ->select('intClientID')
            ->where('intCgrmID', $id)
            ->first();
        $clientID = $result->intClientID;

        $delivery = DB::table('tblgunorderheader')
            ->join('tblgundeliveryheader', 'tblgundeliveryheader.intGunOrderHeaderID', '=', 'tblgunorderheader.intGunOrderHeaderID')
            ->select('tblgundeliveryheader.*')
            ->where('tblgunorderheader.intClientID', $clientID)
            ->get();
        return response()->json($delivery);
    }

    public function getDeliveryCode(Request $request){
        $id = Input::get('id');

        $deliveryCode = DB::table('tblgundeliveryheader')
            ->select('strDeliveryCode')
            ->where('intGunDeliveryHeaderID', $id)
            ->first();

        return response()->json($deliveryCode->strDeliveryCode);
    }

    public function getDeliveryDetail(Request $request){
        $deliveryHeaderID = Input::get('id');

        $deliveryDetail = DB::table('tblgundeliverydetail')
            ->join('tblgunorderdetail', 'tblgunorderdetail.intGunOrderDetailID', '=', 'tblgundeliverydetail.intGunOrderDetailID')
            ->join('tblgun', 'tblgun.intGunID', '=','tblgunorderdetail.intGunID')
            ->join('tbltypeofgun','tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.*', 'tbltypeofgun.strTypeOfGun', 'tblgunorderdetail.intRounds', 'tblgundeliverydetail.intGunDeliveryDetailID')
            ->where('tblgundeliverydetail.intGunDeliveryHeaderID', $deliveryHeaderID)
            ->get();
        
        return response()->json($deliveryDetail);
    }

    public function setGuardReceiver(Request $request){
        $username = $request->username;
        $password = $request->password;
        $cgrmID = $request->session()->get('id');
        $now = Carbon::now();

        $result = DB::table('tblaccount')
            ->select('intAccountID', 'intAccountType')
            ->where('strUsername', $username)
            ->where('strPassword', $password)
            ->first();

        if (is_null($result) || $result->intAccountType != 2){
            return response()->json('false');
        }

        $accountID = $result->intAccountID;

        $result = DB::table('tblguard')
            ->select('intGuardID')
            ->where('intAccountID', $accountID)
            ->first();

        $guardID = $result->intGuardID;
        
        $clientID = DB::table('tblcgrm')
            ->select('intClientID')
            ->where('intCgrmID', $cgrmID)
            ->first();
        
        $guardIDs = DB::table('tblclient')
            ->join('tblcontract', 'tblcontract.intClientID', '=','tblclient.intClientID')
            ->join('tblclientguard' ,'tblclientguard.intContractID', '=','tblcontract.intContractID')
            ->join('tblguard', 'tblguard.intGuardID', '=','tblclientguard.intGuardID')
            ->select('tblguard.intGuardID')
            ->where('tblclient.intClientID', $clientID->intClientID)
            ->groupBy('tblclientguard.intGuardID')
            ->get();

        $clientGuard = array();
        foreach($guardIDs as $value){
            $result = DB::table('tblclientguard')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguard.strFirstName','tblguard.strLastName', 'tblguardlicense.strLicenseNumber','tblguard.intGuardID', 'tblclientguard.boolStatus')
                ->where('tblclientguard.intGuardID' ,$value->intGuardID)
                ->where('tblclientguard.created_at', '<', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            if (($result->boolStatus == 1 || $result->boolStatus == 3) && $result->intGuardID == $guardID){
                $request->session()->put('guardIDReceiver', $guardID);
                return response()->json('true');
            }//filter
        }//foreach

        return response()->json('false');
    }
}
