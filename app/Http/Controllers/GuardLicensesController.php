<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
class GuardLicensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/guardLicenses');
    }

    public function getGuardToBeExpired(){
        $expirationDate = Carbon::now();
        $expirationDate->addMonths(2);
        $guardToBeExpired = DB::table('tblguardlicense')
            ->join('tblguard', 'tblguard.intGuardID', '=', 'tblguardlicense.intGuardID')
            ->select('tblguardlicense.strLicenseNumber', 'tblguardlicense.dateExpiration', 'tblguard.intGuardID', 'tblguard.strFirstName', 'tblguard.strLastName')
            ->where('tblguardlicense.dateExpiration', '<=', $expirationDate)
            ->get();

        foreach($guardToBeExpired as $value){
            $dateExpiration = new Carbon($value->dateExpiration);    
            
            $value->dateExpiration = $dateExpiration->toFormattedDateString();
        }
        
        return response()->json($guardToBeExpired);
    }

    public function updateGuardLicense(Request $request){
        $guardID = $request->guardID;
        $dateFrom =$request->dateFrom;
        $dateTo = $request->dateTo;

        DB::table('tblguardlicense')
            ->where('intGuardID', $guardID)
            ->update([
                'dateIssued' => $dateFrom,
                'dateExpiration' => $dateTo
            ]);
    }
}
