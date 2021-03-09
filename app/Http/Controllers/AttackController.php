<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\UserConstruct;
use App\MilitaryUser;
use App\MilitaryAction;
use App\Galactic;
use DB;
class AttackController extends Controller
{
    //
    function index(){
        $id_galatic_current = Auth::user()->id_galactic;
        $users = User::where('id_galactic',$id_galatic_current)->where('id','!=',Auth::user()->id)->get();
        return view('user.attack.index',['users'=>$users]);
    }
    function attack_username($username,Request $r){
        $cons=  DB::table('construction')
    	 ->select('*',DB::raw('COUNT(id_c) as quantity'))
	    ->join('user_construct', 'user_construct.id_construct_c','construction.id_c')
	    ->where('user_construct.id_user_c',$r->id)
	    ->where('user_construct.status_c',1)
	    ->groupBy('id_c')
	    ->get();
        $id_galatic_current = Auth::user()->id_galactic;
        $loca_user = User::find($r->id)->location;
        $loca_galactic = Galactic::find($id_galatic_current)->location;
        return view('user.attack.attack',['cons'=>$cons, 'location'=>$loca_galactic, 'loca_user'=>$loca_user]);

    }
    public function insert(Request $r)
    {
        // submit form, sẽ có array dạng {$k=>$v} trong đó $k là id quân sự, $v là số lượng cần thủ
    	$arr=$r->all();
    	$id_c = $r->id_c;
        $id_user= $r->id_user_attacked;
    	array_pop($arr);
        array_pop($arr);
    	$id_u=Auth::user()->id;
    	foreach ( $arr as $k => $v) {
            if($v){
                $d=MilitaryUser::where('id_user_m',$id_u)->where('id_mili_m',$k)->where('status_m',1)->where('status_free',0)->take($v)->update(['status_free'=>1]);

                $check= MilitaryAction::where('id_user',$id_u)
                ->where('id_u_attacked',$id_user)
                ->where('id_con_attacked',$id_c)
                ->where('id_mil', $k)
                ->first();
                if($check){
                    $check->quantity_mil=$check->quantity_mil+$v;
                    $check->save();
                }else{
                    $new = new MilitaryAction;
                    $data_u= User::find($id_user);
                    $local= explode(".",$data_u->location);
                    $local = $local[0].'.'.$local[1].'.'.$local[2].'.'.$local[3];
                    $localhost = explode(".",Auth::user()->location);
                    $localhost = $localhost[0].'.'.$localhost[1].'.'.$localhost[2].'.'.$localhost[3];
                    $time = $local==$localhost? 6:12;

                    $dt = date("Y-m-d H:i:s");
                    $dt = strtotime($dt);
                    $dt = strtotime("+".$time." hours", $dt);
     
                    $dt = date("Y-m-d H:i:s",$dt);
                    $new->id_user=$id_u;
                    $new->id_u_attacked=$id_user;
                    $new->id_con_attacked= $id_c;
                    $new->id_mil=$k;
                    $new->quantity_mil=$v;
                    $new->time_attack = $dt;
                    $new->save();
                }
        }
    	}
    	return "ok lun";
    }
}
