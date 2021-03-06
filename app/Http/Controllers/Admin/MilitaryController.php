<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Military;
use App\MilitaryAttr;
use App\Resource;
use DB;

class MilitaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.military.index',['mili'=>Military::all()]);
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

    public function param($id)
    {
        $list = DB::table('military_attr')
            ->join('resource', 'military_attr.id_re', '=', 'resource.id_resourse')
            ->where('military_attr.id_m',$id)
            ->where('military_attr.id_a_planet','!=',null)
            ->get();
        return view('admin.military.param',['re'=>Resource::where('is_2',1)->get(),'id'=>$id,'list'=>$list]);
    }


    public function payload($id)
    {
        $list = DB::table('military_attr')
            ->join('resource', 'military_attr.id_re', '=', 'resource.id_resourse')
            ->where('military_attr.id_m',$id)
            ->where('military_attr.id_a_planet',null)
            ->get();
        return view('admin.military.payload',['re'=>Resource::where('is_2',0)->get(),'id'=>$id,'list'=>$list]);
    }
    public function save_param(Request $r)
    {
        $d = new MilitaryAttr;
        $d->id_m= $r->id;
        $d->id_re= $r->re;
        $d->value_m= $r->v;
        $d->id_a_planet= $r->re;
        $d->save();
        return back();
    }

    public function save_payload(Request $r)
    {
        $d = new MilitaryAttr;
        $d->id_m= $r->id;
        $d->id_re= $r->re;
        $d->value_m= $r->v;
        // $d->id_a_planet= $r->id_planet;
        $d->save();
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $d = new Military;
        $d->name_m= $r->name;
        $d->desc_m= $r->desc;
        $d->type= $r->type;
        $d->weight_m= $r->weight;
        $d->time_build= $r->time;
        $d->ability_m= $r->ability;
        $d->ability_re_m= 0;
        $d->speed_m= 0;
        $d->ranked_m= 0;
        $d->save();
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
