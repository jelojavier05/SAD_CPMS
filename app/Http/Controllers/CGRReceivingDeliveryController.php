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
            return response()->json(false);
        }

        $accountID = $result->intAccountID;

        $result = DB::table('tblguard')
            ->select('intGuardID')
            ->where('intAccountID', $accountID)
            ->first();
        $guardID = $result->intGuardID;
        
        $client = DB::table('tblcgrm')
            ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblcgrm.intClientID')
            ->select('tblcgrm.intClientID', 'tblcontract.intContractID')
            ->where('intCgrmID', $cgrmID)
            ->where('tblcontract.boolStatus', 1)
            ->first();

        $guardIDs = DB::table('tblclientguard')
            ->select('intGuardID')
            ->where('intContractID', $client->intContractID)
            ->groupBy('intGuardID')
            ->get();

        $clientGuard = array();
        foreach($guardIDs as $value){
            $result = DB::table('tblcontract')    
                ->join('tblclientguard', 'tblclientguard.intContractID', '=', 'tblcontract.intContractID')
                ->join('tblguard', 'tblguard.intGuardID', '=', 'tblclientguard.intGuardID')
                ->join('tblguardlicense', 'tblguardlicense.intGuardID', '=', 'tblguard.intGuardID')
                ->select('tblguard.strFirstName','tblguard.strLastName', 'tblguardlicense.strLicenseNumber','tblguard.intGuardID', 'tblclientguard.boolStatus')
                ->where('tblclientguard.intGuardID', $value->intGuardID)
                ->where('tblclientguard.intContractID', $client->intContractID)
                ->where('tblclientguard.created_at', '<=', $now)
                ->orderBy('tblclientguard.created_at', 'desc')
                ->first();

            if (($result->boolStatus == 1 || $result->boolStatus == 3) && $result->intGuardID == $guardID){
                
                $resultAttendance = DB::table('tblattendance')
                    ->select('datetimeIn', 'datetimeOut')
                    ->where('intGuardID', $value->intGuardID)
                    ->where('intClientID', $client->intClientID)
                    ->orderBy('intAttendanceID', 'desc')
                    ->first();

                if (!is_null($resultAttendance) &&
                    (!is_null($resultAttendance->datetimeIn) && $resultAttendance->datetimeOut == '0000-00-00 00:00:00')){
                    $request->session()->put('guardIDReceiver', $guardID);
                    return response()->json(true);    
                }else{
                    return response()->json(false);
                }// if the guard is logged in
            }//filter
        }//foreach

        return response()->json(false);
    }

    public function postItem(Request $request){
        $guardIDReceiver = $request->session()->get('guardIDReceiver');
        $itemID = $request->arrItemPost;
        $status = $request->arrItemStatus;
        $reason = $request->reason;
        $deliveryID = $request->deliveryID;
        $deliveryType = $request->deliveryType;
        $now = Carbon::now();

        $id = $request->session()->get('id');

        $result = DB::table('tblcgrm')
            ->select('intClientID')
            ->where('intCgrmID', $id)
            ->first();
        $clientID = $result->intClientID;
        $result = DB::table('tblcontract')
            ->select('intContractID')
            ->where('intClientID', $clientID)
            ->where('boolStatus', 1)
            ->first();
        $contractID = $result->intContractID;

        try{
            DB::beginTransaction();

            $receiveHeaderID = DB::table('tblgunreceiveheader')
                ->insertGetId([
                    'intGunDeliveryHeaderID' => $deliveryID,
                    'intGuardIDReceiver' => $guardIDReceiver,
                    'strReason' => $reason
                ]);

            DB::table('tblgundeliveryheader')
                ->where('intGunDeliveryHeaderID', $deliveryID)
                ->update([
                    'boolStatus' => 0
                ]);

            for($intLoop = 0; $intLoop < count($itemID); $intLoop ++){
                $deliveryDetailID = $itemID[$intLoop];
                $deliveryStatus = $status[$intLoop];

                DB::table('tblgunreceivedetail')
                    ->insert([
                        'intGunReceiveHeaderID' => $receiveHeaderID,
                        'intGunDeliveryDetailID' => $deliveryDetailID,
                        'boolStatus' => $deliveryStatus
                    ]);

                $gun = DB::table('tblgundeliverydetail')
                    ->join('tblgunorderdetail', 'tblgunorderdetail.intGunOrderDetailID', '=', 'tblgundeliverydetail.intGunOrderDetailID')
                    ->select('tblgunorderdetail.intGunID', 'tblgunorderdetail.intRounds')
                    ->where('tblgundeliverydetail.intGunDeliveryDetailID', $deliveryDetailID)
                    ->first();

                if ($deliveryStatus == 1){
                    $gunStatus = 2;
                    $deliveryDetailStatus = 2;

                    DB::table('tblclientgun')
                        ->insert([
                            'intGunID' => $gun->intGunID, 
                            'intContractID' => $contractID,
                            'intRound' => $gun->intRounds,
                            'created_at' => $now
                    ]);

                    DB::table('tblgunstatus')->insert([
                        'intGunID' => $gun->intGunID,
                        'boolStatus' => 2,
                        'dateEffectivity' => $now
                    ]);
                }else{
                    $gunStatus = 1;
                    $deliveryDetailStatus = 0;
                }

                DB::table('tblgun')
                    ->where('intGunID', $gun->intGunID)
                    ->update([
                        'boolFlag' => $gunStatus
                    ]);

                DB::table('tblgundeliverydetail')
                    ->where('intGunDeliveryDetailID', $deliveryDetailID)
                    ->update([
                        'boolStatus' => $deliveryDetailStatus
                    ]);

                if ($deliveryType == 1){
                    $swapRequestID = DB::table('tblgundeliveryheader')
                        ->join('tblgunorderheader', 'tblgunorderheader.intGunOrderHeaderID', '=', 'tblgundeliveryheader.intGunOrderHeaderID')
                        ->join('tblswapordergun', 'tblswapordergun.intGunOrderHeaderID', '=', 'tblgunorderheader.intGunOrderHeaderID')
                        ->join('tblswapgunheader', 'tblswapgunheader.intSwapGunHeaderID', '=', 'tblswapordergun.intSwapGunHeaderID')
                        ->select('tblswapgunheader.intSwapGunHeaderID')
                        ->where('tblgundeliveryheader.intGunDeliveryHeaderID', $deliveryID)
                        ->first();

                    DB::table('tblswapgunheader')
                        ->where('intSwapGunHeaderID', $swapRequestID->intSwapGunHeaderID)
                        ->update([
                            'boolStatus' => 2,
                            'updated_at' => $now
                        ]);

                    $arrGunRemove = $request->arrGunRemove;
                    
                    foreach($arrGunRemove as $value){
                        DB::table('tblclientgun')
                            ->where('intGunID', $value)
                            ->where('intContractID', $contractID)
                            ->where('boolStatus', 1)
                            ->update([
                                'boolStatus' => 0,
                                'updated_at' => $now
                            ]);

                        DB::table('tblgun')
                            ->where('intGunID', $value)
                            ->update([
                                'boolFlag' => 1
                            ]);

                        DB::table('tblgunstatus')->insert([
                            'intGunID' => $value,
                            'boolStatus' => 1,
                            'dateEffectivity' => $now
                        ]);
                    }
                }
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public function swapRequestGunInformation(Request $request){
        $deliveryID = Input::get('deliveryID');

        $gunRemove = DB::table('tblgundeliveryheader')
            ->join('tblgunorderheader', 'tblgunorderheader.intGunOrderHeaderID', '=', 'tblgundeliveryheader.intGunOrderHeaderID')
            ->join('tblswapordergun','tblswapordergun.intGunOrderHeaderID', '=', 'tblgunorderheader.intGunOrderHeaderID')
            ->join('tblswapgunheader', 'tblswapgunheader.intSwapGunHeaderID', '=', 'tblswapordergun.intSwapGunHeaderID')
            ->join('tblswapgundetail', 'tblswapgundetail.intSwapGunHeaderID', '=', 'tblswapgunheader.intSwapGunHeaderID')
            ->join('tblgun', 'tblgun.intGunID', '=', 'tblswapgundetail.intGunID')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.strGunName', 'tblgun.strSerialNumber', 'tbltypeofgun.strTypeOfGun', 'tblgun.intGunID')
            ->where('tblgundeliveryheader.intGunDeliveryHeaderID', $deliveryID)
            ->get();

        $gunDeliver = DB::table('tblgundeliverydetail')
            ->join('tblgunorderdetail', 'tblgunorderdetail.intGunOrderDetailID', '=', 'tblgundeliverydetail.intGunOrderDetailID')
            ->join('tblgun', 'tblgun.intGunID', '=','tblgunorderdetail.intGunID')
            ->join('tbltypeofgun','tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.strGunName','tblgun.strSerialNumber', 'tbltypeofgun.strTypeOfGun', 'tblgunorderdetail.intRounds', 'tblgundeliverydetail.intGunDeliveryDetailID')
            ->where('tblgundeliverydetail.intGunDeliveryHeaderID', $deliveryID)
            ->get();

        $guns = new \stdClass();
        $guns->gunRemove = $gunRemove;
        $guns->gunDeliver = $gunDeliver;
        
        return response()->json($guns);
    }

    public function getRemoveGunDeliveryInformation(Request $request){
        $deliveryID = Input::get('deliveryID');

        $guns = DB::table('tblgundeliveryheader')
            ->join('tblgundeliverydetail', 'tblgundeliverydetail.intGunDeliveryHeaderID', '=', 'tblgundeliveryheader.intGunDeliveryHeaderID')
            ->join('tblgunorderdetail', 'tblgunorderdetail.intGunOrderDetailID', '=', 'tblgundeliverydetail.intGunOrderDetailID')
            ->join('tblgun', 'tblgun.intGunID', '=', 'tblgunorderdetail.intGunID')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->join('tblclientgun', 'tblclientgun.intGunID', '=', 'tblgun.intGunID')
            ->select('tblgun.intGunID', 'tblgun.strSerialNumber', 'tblgun.strGunName', 'tbltypeofgun.strTypeOfGun', 'tblclientgun.intRound')
            ->where('tblgundeliveryheader.intGunDeliveryHeaderID', $deliveryID)
            ->where('tblclientgun.boolStatus', 1)
            ->get();

        return response()->json($guns);
    }

    public function postRemoveGunDelivery(Request $request){
        $deliveryID = $request->deliveryID;
        $guardIDReceiver = $request->session()->get('guardIDReceiver');
        $id = $request->session()->get('id');

        $clientInformation = DB::table('tblcgrm')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblcgrm.intClientID')
            ->join('tblcontract', 'tblcontract.intClientID', '=', 'tblclient.intClientID')
            ->select('tblclient.intClientID', 'tblcontract.intContractID')
            ->where('intCgrmID', $id)
            ->first();
        $now = Carbon::now();

        try{
            DB::beginTransaction();

            $guns = DB::table('tblgundeliveryheader')
                ->join('tblgundeliverydetail', 'tblgundeliverydetail.intGunDeliveryHeaderID', '=', 'tblgundeliveryheader.intGunDeliveryHeaderID')
                ->join('tblgunorderdetail', 'tblgunorderdetail.intGunOrderDetailID', '=', 'tblgundeliverydetail.intGunOrderDetailID')
                ->select('tblgunorderdetail.intGunID')
                ->where('tblgundeliveryheader.intGunDeliveryHeaderID', $deliveryID)
                ->get();

            DB::table('tblgundeliveryheader')
                ->where('intGunDeliveryHeaderID', $deliveryID)
                ->update([
                    'boolStatus' => 0
                ]);

            DB::table('tblgunreceiveheader')->insert([
                    'intGunDeliveryHeaderID' => $deliveryID,
                    'intGuardIDReceiver' => $guardIDReceiver,
                ]);

            foreach($guns as $value){

                DB::table('tblclientgun')
                    ->where('intGunID', $value->intGunID)
                    ->where('intContractID', $clientInformation->intContractID)
                    ->where('boolStatus', 1)
                    ->update([
                        'boolStatus' => 0,
                        'updated_at' => $now
                    ]);

                DB::table('tblgunstatus')->insert([
                    'intGunID' => $value->intGunID,
                    'boolStatus' => 1,
                    'dateEffectivity' => $now
                ]);

                DB::table('tblgun')
                    ->where('intGunID', $value->intGunID)
                    ->update([
                        'boolFlag' => 1
                    ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
