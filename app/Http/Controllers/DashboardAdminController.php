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

            $value = new \stdClass();
            $value->countClient = $countClient;
            $value->countGuard = $countGuard;
            $value->countGun = $countGun;

             return view('/DashboardAdmin')
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
    }
}
