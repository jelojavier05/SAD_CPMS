<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
class QueryGunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrGunType = DB::table('tbltypeofgun')
            ->select('strTypeOfGun')
            ->where('deleted_at', null)
            ->get();

        $arrClient = DB::table('tblclient')
            ->select('strClientName')
            ->where('intStatusIdentifier', 2)
            ->get();

        return view('/queries/gun')
            ->with('arrGunType', $arrGunType)
            ->with('arrClient', $arrClient);
    }

    public function getGun(Request $request){
        $arrGun = DB::table('tblgun')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->join('tblgunlicense', 'tblgunlicense.intGunID', '=', 'tblgun.intGunID')
            ->select('tblgun.strGunName', 'tbltypeofgun.strTypeOfGun', 'tblgunlicense.strLicenseNumber', 'tblgun.boolFlag')
            ->where('tblgun.boolFlag', '<>', 4)
            ->get();

        $now = Carbon::now();
        
        foreach($arrGun as $value){
            $boolFlag = $value->boolFlag;
            $clientName = 'None';
            if ($boolFlag == 1){
                $status = 'Inventory';
            }else if ($boolFlag == 2){
                $status = 'Deployed';
                $result = DB::table('tblclientgun')
                    ->join('tblcontract', 'tblcontract.intContractID', '=','tblclientgun.intContractID')
                    ->join('tblclient', 'tblclient.intClientID', '=', 'tblcontract.intClientID')
                    ->select('tblclient.strClientName')
                    ->where('tblclientgun.created_at', '<=', $now)
                    ->where('tblcontract.boolStatus', 1)
                    ->orderBy('tblclientgun.created_at', 'desc')
                    ->first();
                $clientName = $result->strClientName;
            }else if ($boolFlag == 3){
                $status = 'Pending';
            }else if ($boolFlag == 0){
                $status = 'Defective';
            }
            $value->clientName = $clientName;
            $value->status = $status;
        }//foreach

        return response()->json($arrGun);
    }

}
