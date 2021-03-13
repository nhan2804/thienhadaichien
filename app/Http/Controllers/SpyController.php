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

class SpyController extends Controller
{
    //

    public function index(Request $r){

    }
    public function insert(Request $r)
    {
        // submit form, sẽ có array dạng {$k=>$v} trong đó $k là id quân sự, $v là số lượng cần thủ
    	$arr=$r->all();
        $loca_user= $r->loca_user;
        array_pop($arr);
    	$id_u=Auth::user()->id;
    	foreach ( $arr as $k => $v) {
            if($v){
                $d=MilitaryUser::where('id_user_m',$id_u)->where('id_mili_m',$k)->where('status_m',1)->where('status_free',0)->take($v)->update(['status_free'=>1]);

                $check= MilitaryAction::where('id_user',$id_u)
                ->where('loca_user_spied',$loca_user)
                ->where('id_mil', $k)
                ->first();
                if($check){

                    $check->quantity_mil=$check->quantity_mil+$v;
                    if($k==13) $check->is_spy= $check->quantity_mil;
                    if($k==12) $check->is_plane= $check->quantity_mil;
                    $check->save();
                }else{
                    $new = new MilitaryAction;
                    // $data_u= User::find($id_user);
                    // $local= explode(".",$data_u->location);
                    // $local = $local[0].'.'.$local[1].'.'.$local[2].'.'.$local[3];
                    // $localhost = explode(".",Auth::user()->location);
                    // $localhost = $localhost[0].'.'.$localhost[1].'.'.$localhost[2].'.'.$localhost[3];
                    // $time = $local==$localhost? 6:12;
                    $time=6;

                    $dt = date("Y-m-d H:i:s");
                    $dt = strtotime($dt);
                    $dt = strtotime("+".$time." hours", $dt);

                    $dt = date("Y-m-d H:i:s",$dt);
                    $new->id_user=$id_u;
                    $new->loca_user_spied = $loca_user;
                    $new->id_mil=$k;
                    if($k==13) $new->is_spy= $v;
                    if($k==12) $new->is_plane= $v;
                    $new->quantity_mil=$v;
                    $new->time_attack = $dt;
                    $new->save();
                }
        }
    	}
    	return "ok lun";
    }
}
