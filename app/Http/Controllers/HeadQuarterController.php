<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\MilitaryUser;
use App\MilitaryAction;
class HeadQuarterController extends Controller
{
    public function add()
    {
    
        // return "????";
        $my_milis=  DB::table('military')
		->select('*',DB::raw('COUNT(id_mili_m) as quantity'))
        ->join('military_user', 'military_user.id_mili_m','military.id_m')
        ->where('type','!=', 3)
        ->where('military_user.id_user_m',Auth::user()->id)
        ->where('military_user.status_m',1)
        ->where('military_user.status_free',0)
        ->groupBy('id_mili_m')
        ->get();
          return response()->json($my_milis);
    }
    public function spy()
    {
    
        // return "????";
        $my_milis=  DB::table('military')
		->select('*',DB::raw('COUNT(id_mili_m) as quantity'))
        ->join('military_user', 'military_user.id_mili_m','military.id_m')
        ->where('type', 3)
        ->where('military_user.id_user_m',Auth::user()->id)
        ->where('military_user.status_m',1)
        ->where('military_user.status_free',0)
        ->groupBy('id_mili_m')
        ->get();
          return response()->json($my_milis);
    }
}
