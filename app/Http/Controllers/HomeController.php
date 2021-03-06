<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planet;
use App\CatePlanet;
use Auth;
class HomeController extends Controller
{
    public function login()
    {
    	 
    	// return print_r(Planet::with('cate')->get());
    	return view('page.loginPage',['planet'=>CatePlanet::all()]);
    }
    public function logout(Request $request)
    {
    	# code.Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }
}
