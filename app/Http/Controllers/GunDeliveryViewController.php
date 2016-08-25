<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Input;

class GunDeliveryViewController extends Controller
{
    
    public function index(){
        $delivery = DB::table('tblgundeliveryheader')
            ->join('tblgunorderheader', 'tblgunorderheader.intGunOrderHeaderID', '=', 'tblgundeliveryheader.intGunOrderHeaderID')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblgunorderheader.intClientID')
            ->select('tblgundeliveryheader.intGunDeliveryHeaderID', 'tblclient.strClientName', 'tblgundeliveryheader.datetimeDeliver')
            ->get();
        
        foreach($delivery as $value){
            $value->dateDeliver = date('M-d-Y', strtotime($value->datetimeDeliver)); 
        }
            
        return view('GunAdmin.gunDeliveryView')
            ->with('delivery', $delivery);
    }
    
    public function getDeliveryInformation(){
        $deliveryID = Input::get('id');
        
        $deliveryInformation = DB::table('tblgundeliveryheader')
            ->select('strDeliveredBy', 'strContactNumber', 'strDeliveryCode', 'boolStatus')
            ->where('intGunDeliveryHeaderID', $deliveryID)
            ->first();
        
        $deliveryDetail = DB::table('tblgundeliveryheader')
            ->join('tblgundeliverydetail', 'tblgundeliverydetail.intGunDeliveryHeaderID', '=', 'tblgundeliveryheader.intGunDeliveryHeaderID')
            ->join('tblgunorderdetail', 'tblgunorderdetail.intGunOrderDetailID' ,'=', 'tblgundeliverydetail.intGunOrderDetailID')
            ->join('tblgun', 'tblgun.intGunID', '=', 'tblgunorderdetail.intGunID')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID','=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.strSerialNumber', 'tblgun.strGunName', 'tbltypeofgun.strTypeOfGun', 'tblgunorderdetail.intRounds', 'tblgundeliverydetail.boolStatus')
            ->where('tblgundeliveryheader.intGunDeliveryHeaderID',$deliveryID)
            ->get();

        $result = DB::table('tblgunreceiveheader')
            ->select('strReason')
            ->where('intGunDeliveryHeaderID', $deliveryID)
            ->first();

        $delivery = new \stdClass();

        if ((is_null($result)) || $result->strReason == ''){
            $delivery->reason = false;
        }else{
            $delivery->reason = $result->strReason;
        }
        
        $delivery->information = $deliveryInformation;
        $delivery->detail = $deliveryDetail;
        
        return response()->json($delivery);
    }
}