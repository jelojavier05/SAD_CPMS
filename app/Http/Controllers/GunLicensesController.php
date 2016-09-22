<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class GunLicensesController extends Controller
{
    public function index()
    {
        return view('/GunAdmin/gunLicenses');
    }

    public function getGunToBeExpired(Request $request){
        $gunExpirationDate = Carbon::now();
        $gunExpirationDate->addMonths(2);
        $gunsTobeExpired = DB::table('tblgunlicense')
            ->join('tblgun', 'tblgun.intGunID', '=', 'tblgunlicense.intGunID')
            ->join('tbltypeofgun', 'tbltypeofgun.intTypeOfGunID', '=', 'tblgun.intTypeOfGunID')
            ->select('tblgun.strSerialNumber', 'tblgun.strGunName', 'tbltypeofgun.strTypeOfGun', 'tblgunlicense.strLicenseNumber', 'tblgunlicense.dateExpiration', 'tblgun.intGunID')
            ->where('dateExpiration', '<=', $gunExpirationDate)
            ->get();

        foreach($gunsTobeExpired as $value){
            $dateExpiration = new Carbon($value->dateExpiration);    
            
            $value->dateExpiration = $dateExpiration->toFormattedDateString();
        }
        
        return response()->json($gunsTobeExpired);
    }

    public function updateGunLicense(Request $request){
        $arrGunID = $request->arrGunID;
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
        
        try{
            DB::beginTransaction();

            foreach($arrGunID as $value){
                DB::table('tblgunlicense')
                    ->where('intGunID', $value)
                    ->update([
                        'dateIssued' => $dateFrom,
                        'dateExpiration' => $dateTo
                    ]);
            }

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }
}
