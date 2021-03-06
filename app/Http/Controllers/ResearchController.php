<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\UserResearch;
use App\UserConstruct;
use Auth;
use DB;
class ResearchController extends Controller
{
    public function index()
    {
    	$id_u = Auth::user()->id;
    	$res = DB::table('research')
    	->leftJoin('user_research',function($j) use ($id_u)
    	{
    		$j->on('research.id_r','user_research.id_rese')
    		->where('user_research.id_user_r',$id_u);
    	})
    	->get();
    	return view('user.research.index',['res'=>$res]);
    }
    public function buy($id,Request $r)
    {
    	$IS_SPAM=5;
    	// return date("Y-m-d H:i:s");
    	$spam = $r->session()->get('spam_'.$id);
    	$spam = $spam?$spam:0;
    	if($spam>=$IS_SPAM) return '<span class="text-danger">Spam có thể sẽ pay acc</span>';

    	$ID_CONSTRUCT_RESEARCH=16;
    	$id_u = Auth::user()->id;
    	// check xem user đã xây khu nghiên cứu chưa
    	$own_has = UserConstruct::where('id_user_c',$id_u)->where('id_construct_c',$ID_CONSTRUCT_RESEARCH)->where('status_c',1)->count();
    	if($own_has){

    	
    	$res= Research::find($id);
    	$check=UserResearch::where('id_user_r',$id_u)->where('id_rese',$id)->first();
    	if($check){
    		if($check->status_r==0){
    		$add= $check->quantity_r;
    		$check->quantity_r=$add+1;
    		$discount = floor($own_has/20*60);
    		// return $discount;

    		$check->status_r= 1;
    		$dt = date("Y-m-d H:i:s");
	        $dt = strtotime($dt);

	        $dt = strtotime("+".($res->time_build*60 - $discount)." seconds", $dt);
	        $dt = date("Y-m-d H:i:s",$dt);
	        // return $dt;
	        $check->time_end = $dt;
    		$check->save();
    		return '<span class="text-success"> Nghiên cứu thành công</span><script>location.reload()</script>';
    		}
    		$r->session()->put('spam_'.$id,$spam+1);
    		return '<span class="text-danger">Chỉ được nghiên cứu tối đa 1 lần, vui lòng đợi lần kế tiếp</span>';
    	}else{
 

    	$d = new UserResearch;
    	$d->id_user_r= $id_u;
    	$d->id_rese= $id;
    	$d->status_r= 1;
    	$d->quantity_r= 1;

    	$discount = floor($own_has/20*60);

    	$dt = date("Y-m-d H:i:s");
        $dt = strtotime($dt);
        $dt = strtotime("+".($res->time_build*60 - $discount)." seconds", $dt);
        $dt = date("Y-m-d H:i:s",$dt);
        $d->time_end = $dt;
        $d->save();
        return '<span class="text-success"> Nghiên cứu thành công</span><script>location.reload()</script>';
        }
    }else{
    	$r->session()->put('spam_'.$id,$spam+1);
    	return '<span class="text-warning">Xây khu công nghệ cao trước để nghiên cứu<span>';
    }
    }
    public function set_status(Request $r)
    {
    	$id_u = Auth::user()->id;
    	$d=UserResearch::where('id_user_r',$id_u)->where('id_rese',$r->id)->first();
    	$d->status_r=0;
    	$d->save();
    	return 0;
    }
}
