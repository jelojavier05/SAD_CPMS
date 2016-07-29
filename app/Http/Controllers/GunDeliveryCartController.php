<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Leave;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Input;

class GunDeliveryCartController extends Controller
{
    
    public function index(){
        $orderHeader = DB::table('tblgunorderheader')
            ->join('tblclient', 'tblclient.intClientID', '=','tblgunorderheader.intClientID')
            ->select('tblclient.strClientName', 'tblgunorderheader.intGunOrderHeaderID', 'tblgunorderheader.created_at')
            ->where('tblgunorderheader.boolStatus', '=', 1)
            ->get();
        
        foreach($orderHeader as $value){
            $value->datetimeCreate = date('M-d-Y', strtotime($value->created_at)); 
        }
        
        return view('GunAdmin.gunDeliveryCart')
            ->with('orderHeader', $orderHeader);
    }
    
    public function getGunOrderDetail(Request $request){
        $orderHeaderID = Input::get('id');
        
        $orderDetail = DB::table('tblgunorderdetail')
            ->join('tblgun', 'tblgun.intGunID','=','tblgunorderdetail.intGunID')
            ->join('tbltypeofgun','tbltypeofgun.intTypeOfGunID','=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.strSerialNumber', 'tblgun.strGunName', 'tbltypeofgun.strTypeOfGun','tblgunorderdetail.intRounds', 'tblgunorderdetail.intGunOrderDetailID')
            ->where('intGunOrderHeaderID', '=', $orderHeaderID)
            ->where('tblgunorderdetail.boolStatus','=', 1)
            ->get();
        
        return response()->json($orderDetail);
        
    }
    
    public function postSelectedGun(Request $request){
        $array = array();
        $id = $request->id;
        $type = $request->type;
        $rounds = $request->rounds;
        $serialNumber =$request->serialNumber;
        $name =$request->name;
        $orderID = $request->orderID;
        
        for ($intLoop = 0; $intLoop < count($id); $intLoop ++){
            $value = new \stdClass();
            $value->id = $id[$intLoop];
            $value->type = $type[$intLoop];
            $value->rounds = $rounds[$intLoop];
            $value->serialNumber = $serialNumber[$intLoop];
            $value->name = $name[$intLoop];

            array_push($array,$value);
        }
        
        $request->session()->put('gunSelected', $array);
        $request->session()->put('orderID', $orderID);
    }
}