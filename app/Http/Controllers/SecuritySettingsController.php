<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Province;
use App\Model\City;
use DB;

class SecuritySettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        return view('/securityguard/SecuritySettings');
    }

    public function getGuardInformation(Request $request){
        $accountID = $request->session()->get('accountID');

        $guard = DB::table('tblguard')
            ->join('tblguardaddress','tblguardaddress.intGuardID', '=', 'tblguard.intGuardID')
            ->join('tblprovince', 'tblprovince.intProvinceID', '=', 'tblguardaddress.intProvinceID')
            ->join('tblcity','tblcity.intCityID','=','tblguardaddress.intCityID')
            ->select('tblguard.*','tblguardaddress.strAddress','tblprovince.strProvinceName','tblcity.strCityName', 'tblprovince.intProvinceID', 'tblcity.intCityID')
            ->where('intAccountID', $accountID)
            ->first();

        $bodyAttributesGuard = DB::table('tblguard')
            ->join('tblguardbodyattribute', 'tblguard.intGuardID', '=', 'tblguardbodyattribute.intGuardID')
            ->join('tblbodyattribute', 'tblguardbodyattribute.intBodyAttributeID', '=', 'tblbodyattribute.intBodyAttributeID')
            ->join('tblmeasurement', 'tblbodyattribute.intMeasurementID', '=', 'tblmeasurement.intMeasurementID')
            ->select('tblmeasurement.strMeasurement', 'tblguardbodyattribute.strValue', 'tblguardbodyattribute.intBodyAttributeID', 'tblbodyattribute.strBodyAttributeName', 'tblguardbodyattribute.intGuardBodyAttributeID')
            ->where('tblguard.intGuardID', '=', $guard->intGuardID)
            ->get();

        $provinces = Province::
            where('deleted_at', null)
                ->where('boolFlag',1)
                ->get();

        $guard->birthday = date('M d, Y', strtotime($guard->dateBirthday)); 
        $guard->bodyAttribute = $bodyAttributesGuard;
        $guard->provinces = $provinces;

        return response()->json($guard);
    }

    public function checkPassword(Request $request){
        $accountID = $request->session()->get('accountID');
        $password = $request->password;
        $account = DB::table('tblaccount')
            ->select('strPassword')
            ->where('intAccountID', $accountID)
            ->first();
        if ($account->strPassword == $password){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }

    public function updateDetail(Request $request){
        $accountID = $request->session()->get('accountID');

        $bodyAttributes = array(); 
        $arrBodyAttributeID = $request->guardBodyAttributeID;
        $arrValue = $request->guardBodyAttributeValue;

        for ($intLoop = 0; $intLoop < count($arrBodyAttributeID); $intLoop ++){
            $value = new \stdClass();
            $value->id = $arrBodyAttributeID[$intLoop];
            $value->value = $arrValue[$intLoop];
            
            array_push($bodyAttributes, $value);
        }   

        try{

            DB::beginTransaction();
            $guardID = DB::table('tblguard')
                ->select('intGuardID')
                ->where('intAccountID', $accountID)
                ->first();

            DB::table('tblguard')
                ->where('intGuardID', $guardID->intGuardID)
                ->update([
                    'strFirstName' => $request->strFirstName,
                    'strMiddleName' => $request->strMiddleName,
                    'strLastName' => $request->strLastName,
                    'dateBirthday' => $request->dateBirthday,
                    'strPlaceBirth' => $request->strPlaceBirth,
                    'strContactNumberMobile' => $request->strContactNumberMobile,
                    'strContactNumberLandline' => $request->strContactNumberLandline,
                    'strCivilStatus' => $request->strCivilStatus,
                    'strGender' => $request->strGender
                ]);

            DB::table('tblguardaddress')
                ->where('intGuardID', $guardID->intGuardID)
                ->update([
                    'strAddress' => $request->strAddress,
                    'intProvinceID' => $request->intProvinceID,
                    'intCityID' => $request->intCityID
                ]);

            foreach($bodyAttributes as $value){
                DB::table('tblguardbodyattribute')
                    ->where('intGuardBodyAttributeID', $value->id)
                    ->update([
                        'strValue' => $value->value
                    ]);
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }

            
    }
}
