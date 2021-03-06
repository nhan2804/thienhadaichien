<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\MilitaryUser;
class DefenseController extends Controller
{
	
	public function index2()
    {
    	 $cons_own=  DB::table('construction')
    	 ->select('*',DB::raw('COUNT(id_c) as quantity'))
	    ->join('user_construct', 'user_construct.id_construct_c','construction.id_c')
	    ->where('user_construct.id_user_c',Auth::user()->id)
	    ->where('user_construct.status_c',1)
	    ->groupBy('id_c')
	    ->get();
	    // return $cons_own;
    	return view('user.headquarter.defense',['cons_own'=>$cons_own]);
    }
	public function overview()
	{
	    $my_milis=  DB::table('military')
		->select('*',DB::raw('COUNT(id_mili_m) as quantity'))
        ->join('military_user', 'military_user.id_mili_m','military.id_m')
        ->where('military_user.id_user_m',Auth::user()->id)
        ->where('military_user.status_m',1)
        ->where('military_user.id_con_def',null)
        ->groupBy('id_mili_m')
        ->get();
        return view('user.headquarter.index',['my_milis'=>$my_milis]);
	}
    
    public function add()
    {
    	$my_milis=  DB::table('military')
    	->select('*',DB::raw('COUNT(id_mili_m) as quantity'))
            ->join('military_user', 'military_user.id_mili_m','military.id_m')
            ->where('military_user.id_user_m',Auth::user()->id)
            ->where('military_user.status_m',1)
            ->where('military_user.id_con_def',null)
            ->groupBy('id_mili_m')
            ->get();
            
            // echo "string";
          return response()->json($my_milis);
    }
    public function detail(Request $r)
    {
    	$detail = DB::table('military')
    		->select('*',DB::raw('COUNT(id_mili_m) as quantity'))
            ->join('military_user', 'military_user.id_mili_m','military.id_m')
            ->where('military_user.id_user_m',Auth::user()->id)
            ->where('military_user.status_m',1)
            ->where('military_user.id_con_def',$r->id)
            ->groupBy('id_mili_m')
            ->get();
            return response()->json($detail);
    }
    public function insert(Request $r)
    {
    	// submit form, sẽ có array dạng {$k=>$v} trong đó $k là id quân sự, $v là số lượng cần thủ
    	$arr=$r->all();
    	$id_c = $r->id_c;
    	array_pop($arr);
    	$id_u=Auth::user()->id;
    	foreach ( $arr as $k => $v) {
    		$d=MilitaryUser::where('id_user_m',$id_u)->where('id_mili_m',$k)->where('status_m',1)->where('military_user.id_con_def',null)->take($v)->update(['id_con_def'=>$id_c]);
    		
    		// return $k;
    	}
    	return "ok lun";
    }
}
