<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Auth;
use App\User;
use DB;
use App\Construct;
use App\ConstructPay;
use App\Insight;
use DateTime;
use App\UserConstruct;
use App\BuffAttr;
use Session;
class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'u:u';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
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
    public function handle()
    {
        // return ">>";
        $start = microtime(true);
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


            foreach ($pro as $key => $v)
            {
                $value = $v->value_p;
                 $id_re = $v->id_re;
                $ok = abs($now - strtotime($v->got_at));
                $addion = $this->getValue($v->unit_p, $value);
                $rs = $addion * $ok;

                $value_add = array_key_exists($id_re,$tmp_arr) ? $tmp_arr[$id_re]:100;
                $value_add_2 = array_key_exists($id_re,$tmp_arr_2) ? $tmp_arr_2[$id_re]:0;
            
                $rs =$rs*$value_add/100 + $value_add_2;

                $n_re = $v->name_resource;
                if ($n_re == "L????ng th???c")
                {
                    $food+=$rs;
                    $add = $rs >= $max_food ? $max_food : $food;
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
                    $money += $rs * $farmer;
                    // $add = $money >= $max_money ? $max_money : $money;
                    // $add = $money;
                    // $money = $add;
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
                    echo "$rs | $value  . ";
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
        $time = (microtime(true) - $start);
        $this->info("This is some information.");
        return "alooo";
    }
}
