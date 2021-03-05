<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Insight;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function login(Request $r)
    {
    	
    	$login = [
            'name' => $r->user,
            'password' => $r->pass,
        ];
        # return Hash::make($r->pass);
        if (Auth::attempt($login)) {
        	return redirect('dashboard');
        }else{
        	return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        	echo "false";
        }
    }
    public function register(Request $r)
    {
        
        $login = [
            'name' => $r->user,
            'password' => $r->pass,
        ];
        $d = new User;
        $d->name= $r->user;
        $d->password= Hash::make($r->pass);
        $d->level=1;
        $d->role=1;
        $d->coin=0;
        $d->save();

        $i = new Insight;
        $i->money=1000;
        $i->metal=200;
        $i->food=200;
        $i->fuel=200;
        $i->uranium=200;
        $i->quartz=200;
        $i->farmer=0;
        
        $i->max_money=5000;
        $i->max_metal=5000;
        $i->max_food=5000;
        $i->max_fuel=5000;
        $i->max_uranium=5000;
        $i->max_quartz=5000;
        $i->max_farmer=0;
        $i->id_user=$d->id;
        $i->save();
        if (Auth::attempt($login)) {
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
            echo "false";
        }
    }
}
