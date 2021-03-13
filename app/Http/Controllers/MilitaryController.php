<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Military;
use App\MilitaryAttr;
use App\MilitaryUser;
use App\BuffAttr;
use App\Insight;
use App\UserConstruct;
use Auth;
class MilitaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hideAll()
    {
        MilitaryUser::where('id_user_m', Auth::user()->id)
        ->where('status_m', 1)
        ->update(['hide' => 1]);
        return back();
    }
    public function set_status($id)
    {
        // $d = MilitaryUser::find($id);
        // $d->status_m=1;
        // $d->save();
        echo "string";
    }

    public function set_status_hide($id)
    {
        $ccheck = MilitaryUser::where('status_m',0)->where('id_user_m',Auth::user()->id)->where('id_mili_m',$id)->where('time_end', '<=',date("Y-m-d H:i:s") )->update(['status_m'=>1,'hide'=>1]);
        return back();
    }
    public function buy($id,$num)
    {
        $mi=Military::find($id);
        $type= $mi->type;
        $id_u=Auth::user()->id;
        $id_cons=0;
        if($type==1){
            $id_cons=14;
        }else if($type==3){
            $id_cons=15;
        }else if($type==2){
            return "<p class='text-warning'>Hiện chưa có công trình xây trên không, quay lại sau!</p>";
        }
        $check=UserConstruct::where('id_user_c',$id_u)->where('id_construct_c',$id_cons)->where('status_c',1)->first();
        if(!$check){
            return "<p class='text-danger'>Vui lòng xây công trình tương ứng để tạo quân sự này</p>";
        }

         $id_discount_build= 24;
         $get_discount= BuffAttr::where('id_planet',Auth::user()->planet)->where('id_resource',34)->first();

         $get_discount= $get_discount->value? $get_discount->value:0;
        $num = intval($num);
        $i = Insight::where('id_user',Auth::user()->id)->first();

        // gán id các tài nguyên với từng giá trị của 1 user, do ngu
        $arr= array('22' =>$i->metal,'23'=>$i->quartz,'24'=>$i->fuel,'21'=>$i->food,'20'=>$i->money,'25'=>$i->uranium );
        $pay = array();
         $cons = MilitaryAttr::select('id_re','value_m')->where('id_m',$id)->where('id_a_planet',null)->get();
        foreach ($cons as $key=>$v) {
            if(array_key_exists($v->id_re,$arr)){
                $s= $arr[$v->id_re]-($v->value_m*$num);
               if($s<0){
                return "<p class='text-danger'>Không đủ tiền để xây</p>";
               }
               array_push($pay,$s);
            }
        }
        $i->money=$pay[0];
        $i->food=$pay[1];
        $i->metal=$pay[2];
        $i->quartz=$pay[3];
        $i->fuel=$pay[4];
        $i->uranium=$pay[5];

        $get_discount=round($get_discount, 1);
        $con = $mi->time_build;
        $con= $con - abs(($get_discount*$con)/100);
        $con= $con*60;

        $i->save();




        $ccheck = MilitaryUser::where('status_m',0)->where('id_user_m',Auth::user()->id)->where('id_mili_m',$id)->orderBy('time_end', 'desc')->first();
        for ($i = 1; $i <= $num; $i++) {
            $d = new MilitaryUser;
            $d->id_user_m= $id_u;
            $d->id_mili_m= $id;
            $dt = date("Y-m-d H:i:s");
               if($ccheck){
                $dt = $ccheck->time_end;
               }
            $dt = strtotime($dt);


            $final_time= $con*$i;

            $dt = strtotime("+".$final_time." seconds", $dt);
            $dt = date("Y-m-d H:i:s",$dt);
            $d->time_end= $dt;
            $d->status_m= 0;
            $d->status_free= 0;
            $d->hide= 0;
            $d->save();
        }

        return "<p class='text-success'>Xây thành công</p> <script>location.reload()</script>";

    }
     public function destroy_m(Request $r)
    {

    try {
    $a=intval($r->num);

} catch (Exception $e) {
    return "Lỗi";
}
if(intval($r->num)<=0) return "Số không hợp lệ";
    $n = MilitaryUser::where('status_m',0)->where('id_user_m',Auth::user()->id)->where('id_mili_m',$r->id)->where('time_end', '>',date("Y-m-d H:i:s") )->count();




    if(intval($r->num)>$n) return "Cần nhỏ hơn số lượng chưa đang xây";

    $ccheck = MilitaryUser::where('status_m',0)->where('id_user_m',Auth::user()->id)->where('id_mili_m',$r->id)->where('time_end', '>',date("Y-m-d H:i:s") )->orderBy('time_end','desc')->take($r->num)->delete();
    $i = Insight::where('id_user',Auth::user()->id)->update(['food'=>DB::raw('food + 200'),'metal'=>DB::raw('metal + 2'),'fuel'=>DB::raw('fuel + 20'),'quartz'=>DB::raw('quartz + 10'),'money'=>DB::raw('money + 100')]);
    return "ok";


    }
    public function detail($id)
    {
        $pay = DB::table('military_attr')
            ->join('resource', 'military_attr.id_re','resource.id_resourse')
            ->where('military_attr.id_m',$id)
            ->where('military_attr.id_a_planet',null)
            ->get();
         $param = DB::table('military_attr')
            ->join('resource', 'military_attr.id_re', '=', 'resource.id_resourse')
            ->where('military_attr.id_m',$id)
            ->where('military_attr.id_a_planet','!=',null)
            ->get();

        return response()->json(['pay'=>$pay,'param'=>$param]);
    }
    public function index(Request $r)
    {

        $my_milis=  DB::table('military')
            ->join('military_user', 'military_user.id_mili_m','military.id_m')
            ->where('military_user.id_user_m',Auth::user()->id)
            ->where('military_user.status_m',0)
            ->get();
        $result = array();
            foreach ($my_milis as $e) {
                $result[$e->id_m][] = $e;
            }
        if($r->type){
            $milis = Military::where('type',$r->type)->where('id_m', '!=', 13)->get();
        }else{
            $milis = Military::where('id_m', '!=', 13)->get();
        }

        return view('user.military.index', ['milis'=>$milis,'my_milis'=> $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
