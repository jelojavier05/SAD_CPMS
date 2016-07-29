<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Carbon\Carbon;

class GunDeliveryController extends Controller
{
    
    public function index(Request $request){
        $gunSelected = $request->session()->get('gunSelected');
        $orderID = $request->session()->get('orderID');
        
        $orderDetail = DB::table('tblgunorderheader')
            ->join('tblclient', 'tblclient.intClientID', '=', 'tblgunorderheader.intClientID')
            ->join('tblclientaddress', 'tblclientaddress.intClientID', '=', 'tblclient.intClientID')
            ->join('tblprovince','tblprovince.intProvinceID','=', 'tblclientaddress.intProvinceID')
            ->join('tblcity', 'tblcity.intCityID','=','tblclientaddress.intCityID')
            ->select('tblgunorderheader.intGunOrderHeaderID', 'tblclientaddress.strAddress','tblprovince.strProvinceName', 'tblcity.strCityName', 'tblclient.strClientName', 'tblclient.strContactNumber')
            ->where('tblgunorderheader.intGunOrderHeaderID','=', $orderID)
            ->first();
        
        return view('/clientGunDelivery')
            ->with('gunSelected', $gunSelected)
            ->with('orderDetail', $orderDetail);
    }
    
    public function postDelivery(Request $request){
        $orderID = $request->session()->get('orderID');
        $gunSelected = $request->session()->get('gunSelected');
        $deliveredBy = $request->deliveredBy;
        $contactNumber = $request->contactNumber;
        $now = Carbon::now();
        
        try{
            DB::beginTransaction();
            
            $deliveryID = DB::table('tblgundeliveryheader')->insertGetId([
                'intGunOrderHeaderID' => $orderID, 
                'strDeliveredBy' => $deliveredBy,
                'strContactNumber' => $contactNumber,
                'datetimeDeliver' => $now
            ]);
            
            foreach($gunSelected as $value){
                DB::table('tblgundeliverydetail')->insert([
                    'intGunDeliveryHeaderID' => $deliveryID,
                    'intGunOrderDetailID' => $value->id,
                    'boolStatus' => 0
                ]);
                
                DB::table('tblgunorderdetail')
                    ->where('intGunOrderDetailID', $value->id)
                    ->update(['boolStatus' => 0]);
            }
            
            $countOrderDetail = DB::table('tblgunorderdetail')
                ->where('intGunOrderHeaderID', $orderID)
                ->where('boolStatus', 1)
                ->count();
            
            if ($countOrderDetail == 0){
                DB::table('tblgunorderheader')
                    ->where('intGunOrderHeaderID', $orderID)
                    ->update([
                        'boolStatus' => 0,
                        'updated_at' => $now
                    ]);
            }
            
            $request->session()->forget('orderID');
            $request->session()->forget('gunSelected');
            
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}