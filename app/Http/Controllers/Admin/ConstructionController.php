<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Construct;
use App\Resource;
use App\ConstructPay;
use App\ConstructPro;
use App\ConstructPercent;
use App\ConstructParam;
use DB;
class ConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.construct.index',['cons'=>Construct::all()]);
    }


    public function produce($id)
    {
        $list = DB::table('construct_pro')
            ->join('resource', 'construct_pro.id_re', 'resource.id_resourse')
            ->where('construct_pro.id_c',$id)
            ->get();
        return view('admin.construct.produce',['re'=>Resource::all(),'id'=>$id,'list'=>$list]);
    }
    public function param($id)
    {
        $list = DB::table('construct_param')
            ->join('resource', 'construct_param.id_re', 'resource.id_resourse')
            ->where('construct_param.id_c',$id)
            ->get();
        return view('admin.construct.param',['re'=>Resource::where('resource.is_2',1)->get(),'id'=>$id,'list'=>$list]);
    }
    public function save_param(Request $r)
    {
        $d = new ConstructParam;
        $d->id_c= $r->id;
        $d->id_re= $r->re;
        $d->value_pm= $r->v;
        $d->desc_pm= 0;
        $d->save();
        return back();
    }
    public function save_produce(Request $r)
    {
        $d = new ConstructPro;
        $d->id_c= $r->id;
        $d->id_re= $r->re;
        $d->value_p= $r->v;
        $d->unit_p= $r->unit;
        $d->desc_p= 0;
        $d->save();
        return back();
    }
    public function payload($id)
    {
        $list = DB::table('construct_pay')
            ->join('resource', 'construct_pay.id_re', '=', 'resource.id_resourse')
            ->where('construct_pay.id_c',$id)
            ->get();
        return view('admin.construct.payload',['re'=>Resource::where('is_2',0)->get(),'id'=>$id,'list'=>$list]);
    }
    public function save_payload(Request $r)
    {
        $d = new ConstructPay;
        $d->id_c= $r->id;
        $d->id_re= $r->re;
        $d->value_pa= $r->v;
        $d->unit_pa= 0;
        $d->desc_pa= 0;
        $d->save();
        return back();
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
        $d = new Construct;
        $d->id_parent=0;
        $d->time_build=$r->time;
        $d->name_c=$r->name;
        $d->desc_c=$r->desc_c;
        $d->ranked_c=0;
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
