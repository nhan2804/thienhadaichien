<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\UserConstruct;
use App\MilitaryUser;
use App\MilitaryAction;
use DB;
class ArmyController extends Controller
{
    //
    function index(Request $r){
        $army=  DB::table('military_action')
    	 ->select('*',DB::raw('SUM(quantity_mil) as quantity'))
	    ->join('users', 'users.id','military_action.id_u_attacked')
	    ->where('military_action.id_user',Auth::user()->id)
	    ->groupBy('id_u_attacked')
	    ->get();
        return view('user.headquarter.expeditionary_army',['army'=>$army]);

    }
}
