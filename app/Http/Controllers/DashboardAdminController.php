<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index(Request $request){
        $accountType = $request->session()->get('accountType');
        $now = Carbon::now();
        $expirationDate = Carbon::now();
        $expirationDate->addMonths(2);
        $unpaidBillDate = new Carbon();

        if ($accountType == 3){
            $countClient = DB::table('tblclient')
                ->where('deleted_at', null)
                ->count();
            $countGuard = DB::table('tblguard')
                ->where('deleted_at', null)
                ->count();
            $countGun = DB::table('tblgun')
                ->where('deleted_at', null)
                ->count();
            $countGunLicense = DB::table('tblgunlicense')
                ->where('dateExpiration', '<=', $expirationDate)
                ->count();
            $countGuardLicense = DB::table('tblguardlicense')
                ->where('dateExpiration', '<=', $expirationDate)
                ->count();
            $countUnpaidBills = DB::table('tblclientbillingdate')
                ->where('dateBill', '<=', $unpaidBillDate)
                ->where('boolStatus', 1)
                ->count();

            $value = new \stdClass();
            $value->countClient = $countClient;
            $value->countGuard = $countGuard;
            $value->countGun = $countGun;
            $value->countGunLicense = $countGunLicense;
            $value->countGuardLicense = $countGuardLicense;
            $value->countUnpaidBills = $countUnpaidBills;

             return view('/DashboardAdmin1')
                ->with('value', $value);
            
        }else{
            return redirect('/userlogin');
        }
    }

    public function getPieGuard(Request $request){
        
        $now = Carbon::now();
        $guardsID = DB::table('tblguard')
            ->select('intGuardID')
            ->where('boolStatus', 1)
            ->get();

        if (count($guardsID) > 0){
            $waiting = 0;
            $pending = 0;
            $deployed = 0;
            $onLeave = 0;
            $reliever = 0;

            foreach($guardsID as $value){
                
                $result = DB::table('tblguardstatus')
                    ->select('intStatusIdentifier')
                    ->where('intGuardID', $value->intGuardID)                
                    ->where('dateEffectivity', '<=', $now)
                    ->orderBy('dateEffectivity', 'desc')
                    ->first();

                if ($result->intStatusIdentifier == 0){
                    $waiting ++;
                }else if ($result->intStatusIdentifier == 1 || $result->intStatusIdentifier == 5){
                    $pending ++;
                }else if ($result->intStatusIdentifier == 2){
                    $deployed ++;
                }else if ($result->intStatusIdentifier == 3){
                    $onLeave ++;
                }else if ($result->intStatusIdentifier == 4){
                    $reliever ++;
                }
            }//foreach

            $allGuard = count($guardsID);
            $guardsStatus = new \stdClass();
            $guardsStatus->waiting = $waiting/$allGuard * 100;
            $guardsStatus->pending = $pending/$allGuard * 100;
            $guardsStatus->deployed = $deployed/$allGuard * 100;
            $guardsStatus->onLeave = $onLeave/$allGuard * 100;
            $guardsStatus->reliever = $reliever/$allGuard * 100;
            $guardsStatus->allGuard = $allGuard;

            return response()->json($guardsStatus);
        }else{
            return response()->json(false);
        }
    }

    public function getPieGun(Request $request){
        $result = DB::table('tblgun')
            ->select('boolFlag')
            ->where('boolFlag','<>' ,4)
            ->get();

        if (count($result) > 0){
            $now = Carbon::now();

            $inventory = 0;
            $deployed = 0;
            $pending = 0;
            $notWorking = 0;

            foreach($result as $value){
                if ($value->boolFlag == 0){
                    $notWorking ++;
                }else if ($value->boolFlag == 1){
                    $inventory ++;
                }else if ($value->boolFlag == 2){
                    $deployed ++;
                }else if ($value->boolFlag == 3){
                    $pending ++;
                }//if else
            }//foreach

            $allGun = count($result);
            $gunStatus = new \stdClass();
            $gunStatus->inventory = $inventory/$allGun * 100;
            $gunStatus->deployed = $deployed/$allGun * 100;
            $gunStatus->pending = $pending/$allGun * 100;
            $gunStatus->notWorking = $notWorking/$allGun * 100;

            return response()->json($gunStatus);
        }else{
            return response()->json(false);
        }
    }

    public function getSample(Request $request){
        $result = DB::table('tblguard')
            ->select('strFirstName', 'strLastName')
            ->get();

        $sample = array();
        $intLoop = 0;
        foreach($result as $value){
            $intLoop += 3;
            $guardRecord = new \stdClass();
            $guardRecord->name = $value->strFirstName . ' ' . $value->strLastName;
            $guardRecord->y = $intLoop;

            array_push($sample, $guardRecord);
        }

        return response()->json($sample);
    }
}
