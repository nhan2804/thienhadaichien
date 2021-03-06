<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Classes\TypeNumber;
use DB;
use App\Construct;
use App\ConstructPay;
use App\Insight;
use App\UserConstruct;
use App\BuffAttr;
use App\Galactic;
use App\Galaxy;
use App\UserResearch;
use Session;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_all()
    {
        $start = microtime(true);
        $date2 = date("Y-m-d H:i:s");
        $all_user = User::all();
        foreach ($all_user as $key => $v)
        {
            $id_u_c = $v->id;
            $fullname = $v->fullname;
            $i = Insight::where('id_user', $id_u_c)->first();
            $pro = DB::table('user_construct')->select('id_re', 'value_p', 'unit_p', 'name_resource', 'time_end', 'got_at')
            ->join('construct_pro', 'construct_pro.id_c', 'user_construct.id_construct_c')
            ->join('resource', 'construct_pro.id_re', 'resource.id_resourse')
            ->where('user_construct.id_user_c', $id_u_c)->where('status_c', 1)
            ->where('is_home', null)
            ->get();

            $now = strtotime($date2);
            $food = $i->food;
            $metal = $i->metal;
            $quartz = $i->quartz;
            $uranium = $i->uranium;
            $money = $i->money;
            $fuel = $i->fuel;
            $farmer = $i->farmer;

            $max_food = $i->max_food;
            $max_metal = $i->max_metal;
            $max_quartz = $i->max_quartz;
            $max_uranium = $i->max_uranium;
            $max_money = $i->max_money;
            $max_fuel = $i->max_fuel;
            $max_farmer = $i->max_farmer;

            $tmp_arr= array();
            $discount= BuffAttr::select('id_resource','value')->where('id_planet',$v->planet)->get();
            foreach ($discount as $key => $v) {
                $tmp_arr[$v->id_resource]=$v->value;
            }


              // $discount_rese= UserResearch::select('id_re_got','value_r')->where('id_user_r',$id_u_c)->get();

            $discount_rese= DB::table('research')->select('id_re_got','value_r','quantity_r')
            ->join('user_research','id_r','id_rese')
            ->where('id_user_r',$id_u_c)
            ->get();
            $tmp_arr_2= array();
            foreach ($discount_rese as $key => $v) {
                $tmp_arr_2[$v->id_re_got]=$v->quantity_r*$v->value_r;
            }
              // return $tmp_arr_2;
             // return $tmp_arr;
            // return $pro;
            echo "user ".$fullname." ???</br>";
            foreach ($pro as $key => $v)
            {
                $value = $v->value_p;
                $id_re = $v->id_re;
                $ok = abs($now - strtotime($v->got_at));
                $addion = $this->getValue($v->unit_p, $value);
                $rs = $addion * $ok;

                echo "Trc khi duoc cong $rs </br>";

                $value_add = array_key_exists($id_re,$tmp_arr) ? $tmp_arr[$id_re]:100;// thu???c t??nh h??nh tinh(%5)
                $value_add_2 = array_key_exists($id_re,$tmp_arr_2) ? $tmp_arr_2[$id_re]:0;// thu???c t??nh khi nghi??n c???u
                echo "Trc khi duoc cong + gia tri khi co thuoc tinh htinh la $value_add %</br>";
                echo "Trc khi duoc cong + gia tri khi nghien cuu  $value_add_2 </br>";
                $rs =$rs*$value_add/100 + $value_add_2;

                $n_re = $v->name_resource;
                echo "sau khi duoc cong $rs </br>";
                echo "------ </br>";

                if ($n_re == "L????ng th???c")
                {
                    $add = $rs >= $max_food ? $max_food : $add;
                    $food = $add;
                }
                else if ($n_re == "Kim lo???i")
                {
                    $metal += $rs;
                    $add = $metal >= $max_metal ? $max_metal : $metal;
                    $metal = $add;
                }
                else if ($n_re == "Ti???n")
                {
                    $money = $rs * $farmer;
                    $add = $money >= $max_money ? $max_money : $money;
                    $money = $add;

                }
                else if ($n_re == "Th???ch anh")
                {
                    $quartz += $rs;
                    $add = $quartz >= $max_quartz ? $max_quartz : $quartz;
                    $quartz = $add;
                }
                else if ($n_re == "Nhi??n li???u")
                {
                    $fuel += $rs;
                    $add = $fuel >= $max_fuel ? $max_fuel : $fuel;
                    $fuel = $add;
                }
                else if ($n_re == "Uranium")
                {
                    $uranium += $rs;
                    $add = $uranium >= $max_uranium ? $max_uranium : $uranium;
                    $uranium = $add;
                }
                else if ($n_re == "D??n")
                {
                    $farmer += $rs;
                    $add = $farmer >= $max_farmer ? $max_farmer : $farmer;
                    $farmer = $add;
                }
            }

            // UserConstruct::where('id_user_c',$id_u_c)->update(['got_at'=>date("Y-m-d H:i:s")]);
            $arr = array(
                "food" => $food,
                'fuel' => $fuel,
                'quartz' => $quartz,
                'uranium' => $uranium,
                'money' => $money,
                'metal' => $metal,
                'farmer' => $farmer
            );

            Insight::where('id_user', $id_u_c)->update($arr);
            echo "------------End User-------------";
        }
        // return $farmer;

            // return $money;
        // UserConstruct::update(['got_at' => date("Y-m-d H:i:s") ]);
        DB::table('user_construct')->update(['got_at' => date("Y-m-d H:i:s")]);
        $time = (microtime(true) - $start);
        // $this->info("This is some information.");
        return "alooo";
    }
    public function init(Request $r)
    {
    // $check=UserConstruct::where('id_user_c',Auth::user()->id)->where('id_construct_c',8)->where('status_c',1)->first();
    //   if(!$check){
    //         return response()->json([]);
    //     }
        $pro = DB::table('user_construct')
        ->select('id_re','value_p','unit_p','name_resource','time_end')
        ->join('construct_pro', 'construct_pro.id_c','user_construct.id_construct_c')
        ->join('resource', 'construct_pro.id_re','resource.id_resourse')
        ->where('user_construct.id_user_c',Auth::user()->id)
        ->where('status_c',1)
        ->where('is_home',null)
        ->get();
        return response()->json($pro);

    }
    public function destroy_c(Request $r)
    {
    //   return response()->json($r->all());
        try {
            $a=intval($r->num);

        } catch (Exception $e) {
            return "L???i";
        }
        if(intval($r->num)<=0) return "S??? kh??ng h???p l???";
        $n = UserConstruct::where('id_construct_c',$r->id)->where('id_user_c',Auth::user()->id)->where('status_c',0)->where('time_end', '>',date("Y-m-d H:i:s"))->count();
        if(intval($r->num)>$n) return "C???n nh??? h??n s??? l?????ng ??ang x??y";


         $c = UserConstruct::where('id_construct_c',$r->id)->where('id_user_c',Auth::user()->id)->where('status_c',0)->where('time_end', '>',date("Y-m-d H:i:s"))->orderBy('time_end','desc')->take($r->num)->delete();

        // UserConstruct::where('created_at',$r->time)->take(intval($r->num))->delete();
        $i = Insight::where('id_user',Auth::user()->id)->update(['food'=>DB::raw('food + 200'),'metal'=>DB::raw('metal + 2'),'fuel'=>DB::raw('fuel + 20'),'quartz'=>DB::raw('quartz + 10'),'money'=>DB::raw('money + 100')]);
        return "ok";

    }
    public function built()
    {
        $my_cons=  DB::table('construction')
        ->join('user_construct', 'user_construct.id_construct_c','construction.id_c')
        ->where('user_construct.id_user_c',Auth::user()->id)
        ->where('user_construct.status_c',1)
        ->get();
        $result = array();
        foreach ($my_cons as $e) {
            $result[$e->id_c][] = $e;
        }

        return view('user.built', ['my_cons'=>$result]);
    }
    public function hideAll()
    {
        UserConstruct::where('id_user_c', Auth::user()->id)
        ->where('status_c', 1)
        ->update(['hide' => 1]);
        return back();
    }
    public function set_status($id)
    {
        // $d = UserConstruct::where('');
        // $d->status_c=1;
        // if($d->id_construct_c==8){
        //     $d->is_home=1;

        // }
        // $d->save();
        echo "string";
    }
    public function set_status_hide($id)
    {

        $c = UserConstruct::where('id_construct_c',$id)->where('id_user_c',Auth::user()->id)->where('status_c',0)->where('time_end', '<=',date("Y-m-d H:i:s") )->update(['status_c'=>1,'hide'=>1]);

        $f=500000*$c;
        $m=300000*$c;
        $fu=200000*$c;
        $q=200000*$c;

        $dan= 1000000*$c;


        // b???ng 8 l?? id nh?? kho
        if($id==8){
            $i = Insight::where('id_user',Auth::user()->id)->update(['max_food'=>DB::raw('max_food + '.$f),'max_metal'=>DB::raw('max_metal + '.$m),'max_fuel'=>DB::raw('max_fuel + '.$fu),'max_quartz'=>DB::raw('max_quartz + '.$q)]);
        }
        if($id==5){
            $i = Insight::where('id_user',Auth::user()->id)->update(['max_farmer'=>DB::raw('max_farmer + '.$dan)]);
        }



        return back();
    }
    public function buy_construct($id,$num)
    {


        $ccheck = UserConstruct::where('id_construct_c',$id)->where('id_user_c',Auth::user()->id)->where('status_c',0)->orderBy('time_end', 'desc')->first();

            $num = intval($num);
        // Session::put('variableName', $value);
            $i = Insight::where('id_user',Auth::user()->id)->first();



        // g??n id c??c t??i nguy??n v???i t???ng gi?? tr??? c???a 1 user, do ngu
            $arr= array('22' =>$i->metal,'23'=>$i->quartz,'24'=>$i->fuel,'21'=>$i->food,'20'=>$i->money,'25'=>$i->uranium );
            $pay = array();
            $cons = ConstructPay::select('id_re','value_pa')->where('id_c',$id)->get();
            foreach ($cons as $key=>$v) {
                if(array_key_exists($v->id_re,$arr)){
                    $s= $arr[$v->id_re]-($v->value_pa*$num);
                    if($s<0){
                        return "<p class='text-danger'>Kh??ng ????? ti???n ????? x??y</p>";
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

        // id c???a Gi???m th???i gian x??y d???ng
            $id_discount=34;
            $discount= BuffAttr::where('id_planet',Auth::user()->planet)->where('id_resource',$id_discount)->first()->value or 0;
        // return $discount->value;

            $con = Construct::find($id)->time_build;
         // $con= ($discount*$con/100 + $con)*60;

            $i->save();



            for ($i = 1; $i <= $num; $i++) {
               $d = new UserConstruct;
               $d->id_user_c= Auth::user()->id;
               $d->id_construct_c= $id;

             // $con= ($discount*$con/100 + $con)*60;
               $dt = date("Y-m-d H:i:s");
               if($ccheck){
                $dt = $ccheck->time_end;
               }
               if($id==8) $d->is_home=8;
               $final_time= ($discount*$con/100 + $con)*60*$i;
               $dt = strtotime($dt);
               $dt = strtotime("+".$final_time." seconds", $dt);

               $dt = date("Y-m-d H:i:s",$dt);

               $d->time_end= $dt;
               $d->status_c= 0;
               $d->hide= 0;
               $d->got_at=$dt;
               $d->save();
           }

           return "<p class='text-success'>X??y th??nh c??ng</p> <script>location.reload()</script>";
       // }
   }
   public function getValue($t, $v)
   {
    switch ($t)
    {
        case 's':
        return $v;
        break;
        case 'p':
        return floor($v / 60);
        break;
        case 'h':
        return floor($v / 60 / 60);
        break;
        default:
        return $v;
        break;
    }
}
public function detail_construct($id)
{
    $pay = DB::table('construct_pay')
    ->join('resource', 'construct_pay.id_re','resource.id_resourse')
    ->where('construct_pay.id_c',$id)
    ->get();
    $pro = DB::table('construct_pro')
    ->join('resource', 'construct_pro.id_re','resource.id_resourse')
    ->where('construct_pro.id_c',$id)
    ->get();
    $param = DB::table('construct_param')
    ->join('resource', 'construct_param.id_re','resource.id_resourse')
    ->where('construct_param.id_c',$id)
    ->get();
    return response()->json(['produce'=>$pro,'pay'=>$pay,'param'=>$param]);
}


public function planet(Request $r)
{
    $buff = DB::table('buff_attr')
    ->join('resource', 'buff_attr.id_resource', '=', 'resource.id_resourse')
    ->where('buff_attr.id_planet',$r->id)
    ->get();
    return response()->json($buff);
}
public function choose_planet(Request $r)
{
    $d = User::find(Auth::user()->id);
    $d->planet = $r->id;
    $galatic= Galactic::where('count_planet','<',50)->first();
    if(!$galatic){
        $new = new Galactic;
        $new->location='1.1.1';
        $new->id_galaxy=1;
        $new->count_planet=1;
        $new->save();
        $new->location='1.1.1.'.$new->id;
        $new->save();
        $galatic = $new;
    }
    $d->location = $galatic->location.'.'.$d->id;
    $d->id_galactic = $galatic->id;
    $d->fullname = $r->name;
    $d->save();
    return back();
}
public function index()
{
        // if(!Auth::user()->planet){
        //     $cate = DB::table('cate_planet')
        //     ->join('planet', 'cate_planet.id_planet', '=', 'planet.id_planet')
        //     ->get();
        //     return view('user.choose_planet',['cate'=>$cate]);
        // }



    $cons_own=  DB::table('construction')
    ->join('user_construct', 'user_construct.id_construct_c','construction.id_c')
    ->where('user_construct.id_user_c',Auth::user()->id)
    ->where('user_construct.hide',0)
    ->get();
    $result = array();
    foreach ($cons_own as $e) {
        $result[$e->id_c][] = $e;
    }
            // return $result;
    $cons = Construct::all();
    return view('user.build', ['cons_own'=>$result,'cons'=>$cons]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.create', ['user' => Auth::user(), 'users' => User::where('account_of', Auth::user()->id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

    }

    public function export()
    {

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
    public function update(Request $r, $id)
    {
        // return $r->birth;
        $d = User::find(Auth::user()->id);
        $d->fullname = $r->fullname;
        $d->birth = $r->birth;
        $d->phone = $r->phone;
        $d->save();

        $num = new TypeNumber($r->fullname, $r->birth);

        return $num->getNumofRepeats();

        return back();
    }
    public function test_export(Request $r)
    {

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
