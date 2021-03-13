<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MilitaryUser;
use App\MilitaryAction;
use Auth;
use DB;
class AgenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $my_milis=  DB::table('military_action')
        ->select("*",DB::raw('SUM(is_spy) as spy'),DB::raw('SUM(is_plane) as plane'))
        ->join('users', 'users.location','military_action.loca_user_spied')
        ->where('military_action.id_user',Auth::user()->id)
        ->groupBy("loca_user_spied")
        ->get();
        // return $my_milis;
        return view('user.intelligence_agencies.index',['my_milis'=>$my_milis]);
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
    public function store(Request $r)
    {
        $id_u=Auth::user()->id;
        for ($i=1; $i <=$r->quantity ; $i++) {
            $mili = new MilitaryUser;
            $mili->id_user_m=$id_u;
            $mili->id_mili_m = 13;
            $mili->status_m = 1;
            $mili->status_free = 1;
            $mili->save();
        }
        $mili_action = new MilitaryAction;
        $mili_action->id_user = $id_u;
        $mili_action->loca_user_spied = $r->loca;
        $mili_action->id_mil = 13;
        $mili_action->quantity_mil = $r->quantity;
        $dt = date("Y-m-d H:i:s");
        $dt = strtotime($dt);
        $dt = strtotime("+". ($r->quantity * 6)." hours", $dt);
        $dt = date("Y-m-d H:i:s",$dt);
        $mili_action->time_attack = $dt;
        $mili_action->save();
        return back();
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
