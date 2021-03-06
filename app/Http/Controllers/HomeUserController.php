<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use App\Construct;
use App\ConstructPay;
use App\Insight;
use DateTime;
use App\UserConstruct;
use Session;
use App\BuffAttr;
class HomeUserController extends Controller
{

    public function update_all()
    {

        
        $date2 = date("Y-m-d H:i:s");
        $all_user = User::all();
        foreach ($all_user as $key => $v)
        {
            $id_u_c = $v->id;
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


            foreach ($pro as $key => $v)
            {
                $value = $v->value_p;
                $ok = abs($now - strtotime($v->got_at));
                $addion = $this->getValue($v->unit_p, $value);
                $rs = $addion * $ok;
                $n_re = $v->name_resource;
                if ($n_re == "Lương thực")
                {
                    $food+=$rs;
                    $add = $rs >= $max_food ? $max_food : $add;
                    $food = $add;
                }
                else if ($n_re == "Kim loại")
                {
                    $metal += $rs;
                    $add = $metal >= $max_metal ? $max_metal : $metal;
                    $metal = $add;
                }
                else if ($n_re == "Tiền")
                {
                    $money = $rs * $farmer;
                    $add = $money >= $max_money ? $max_money : $money;
                    $money = $add;
                }
                else if ($n_re == "Thạch anh")
                {
                    $quartz += $rs;
                    $add = $quartz >= $max_quartz ? $max_quartz : $quartz;
                    $quartz = $add;
                }
                else if ($n_re == "Nhiên liệu")
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
                else if ($n_re == "Dân")
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
        }
        // UserConstruct::update(['got_at' => date("Y-m-d H:i:s") ]);
        DB::table('user_construct')->update(['got_at' => date("Y-m-d H:i:s")]);
       
        return $time;
    }
    public function setup()
    {
      
        $id_u_c = Auth::user()->id;
        $i = Insight::where('id_user', $id_u_c)->first();

        $pro = DB::table('user_construct')->select('id_re', 'value_p', 'unit_p', 'name_resource', 'time_end', 'got_at')
            ->join('construct_pro', 'construct_pro.id_c', 'user_construct.id_construct_c')
            ->join('resource', 'construct_pro.id_re', 'resource.id_resourse')
            ->where('user_construct.id_user_c', $id_u_c)->where('status_c', 1)
            ->where('is_home', null)
            ->get();
        $date2 = date("Y-m-d H:i:s");
        $now = strtotime($date2);
        $food = $i->food;
        $metal = $i->metal;
        $quartz = $i->quartz;
        $uranium = $i->uranium;
        $money = intval($i->money);
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
             $discount= BuffAttr::select('id_resource','value')->where('id_planet',Auth::user()->planet)->get();
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

        foreach ($pro as $key => $v)
        {
            $value = $v->value_p;
             $id_re = $v->id_re;
            $ok = abs($now - strtotime($v->got_at));
            $addion = $this->getValue($v->unit_p, $value);

            // echo "<p>".$addion."</p>";
            $rs = $addion * $ok;
             $value_add = array_key_exists($id_re,$tmp_arr) ? $tmp_arr[$id_re]:100;
                $value_add_2 = array_key_exists($id_re,$tmp_arr_2) ? $tmp_arr_2[$id_re]:0;
            
                $rs =$rs*$value_add/100 + $value_add_2;
            //  echo "<p>$rs</p>";
            $n_re = $v->name_resource;
            if ($n_re == "Lương thực")
            {
                $food+=$rs;
                $add = $food >= $max_food ? $max_food : $food;
                $food = $add;
            }
            else if ($n_re == "Kim loại")
            {
                $metal += $rs;
                $add = $metal >= $max_metal ? $max_metal : $metal;
                $metal = $add;
            }
            else if ($n_re == "Tiền")
            {
                $money += $rs * $farmer;
                // return $addion.' * '.$ok.' * '.$farmer;
                // echo $ok;
                // $add = $money >= $max_money ? $max_money : $money;
                // $money = $add;
            }
            else if ($n_re == "Thạch anh")
            {
                $quartz += $rs;
                $add = $quartz >= $max_quartz ? $max_quartz : $quartz;
                $quartz = $add;
            }
            else if ($n_re == "Nhiên liệu")
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
            else if ($n_re == "Dân")
            {
                $farmer += $rs;
                $add = $farmer >= $max_farmer ? $max_farmer : $farmer;
                $farmer = $add;
            }

        }

        UserConstruct::where('id_user_c', $id_u_c)->update(['got_at' => date("Y-m-d H:i:s") ]);
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
        return back();
        // return;
        
    }
    public function getTime($t, $s)
    {
        switch ($t)
        {
            case 's':
                return $s;
            break;
            case 'p':
                return round($s / 60);
            break;
            case 'h':
                return floor($s / 60 / 60);
            break;
            default:
                return $s;
            break;
        }
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
    public function index()
    {
        if (!Auth::user()->planet)
        {
            $cate = DB::table('cate_planet')->join('planet', 'cate_planet.id_planet', '=', 'planet.id_planet')
                ->get();
            return view('user.choose_planet', ['cate' => $cate]);
        }
        return view('user.notify.index');
    }
    public function overview($value = '')
    {
        $my_cons = DB::table('construction')->join('user_construct', 'user_construct.id_construct_c', 'construction.id_c')
            ->where('user_construct.id_user_c', Auth::user()
            ->id)
            ->where('user_construct.status_c', 1)
            ->get();
        $result = array();
        foreach ($my_cons as $e)
        {
            $result[$e->id_c][] = $e;
        }
        $pro = DB::table('user_construct')->select('id_re', 'value_p', 'unit_p', 'name_resource', 'time_end')
            ->join('construct_pro', 'construct_pro.id_c', 'user_construct.id_construct_c')
            ->join('resource', 'construct_pro.id_re', 'resource.id_resourse')
            ->where('user_construct.id_user_c', Auth::user()
            ->id)
            ->where('status_c', 1)
        ->where('is_home',null)
        
            ->get();
        $rs = array();
        foreach ($pro as $e)
        {
            $rs[$e->id_re][] = $e;
        }

        $my_milis = DB::table('military')->join('military_user', 'military_user.id_mili_m', 'military.id_m')
            ->where('military_user.id_user_m', Auth::user()
            ->id)
            ->where('military_user.status_m', 1)
            ->get();
        $result_mili = array();
        foreach ($my_milis as $e)
        {
            $result_mili[$e->id_m][] = $e;
        }

        // return response()->json($rs);
        return view('user.overview', ['my_cons' => $result, 'pro' => $rs, 'my_mili' => $result_mili]);
    }
    public function news($value = '')
    {
        return view('user.news');
    }
    public function intelligence_agencies($value = '')
    {
        return view('user.intelligence_agencies.index');
    }
    public function headquarter($value = '')
    {
        return view('user.headquarter.index');
    }
    public function army($value = '')
    {
        return view('user.headquarter.army');
    }
    public function colony($value = '')
    {
        return view('user.headquarter.colony');
    }
    public function market($value = '')
    {
        return view('user.market.index');
    }
}

