<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Resource;
use App\BuffAttr;
use App\CatePlanet;
use DB;
class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buff($id)
    {
        $buff = DB::table('buff_attr')
            ->join('resource', 'buff_attr.id_resource', '=', 'resource.id_resourse')
            ->where('buff_attr.id_planet',$id)
            ->get();
            // return print_r($buff);
        return view('admin.planet.buff',['buff'=>$buff,'cate'=>Resource::all(),'id'=>$id]);
    }
    public function save_buff(Request $r)
    {
        $d = new BuffAttr;
        $d->id_planet = $r->id_pl;
        $d->id_resource= $r->id_re;
        $d->value= $r->v;
        $d->percent= 0;
        $d->desc_buff_a= $r->desc;
        // echo "string";
        $d->save();
        return back();
    }
    public function index()
    {
        return view('admin.planet.index',['cate'=>CatePlanet::all()]);
    }

    /**
     * Show the form for creating a new resource.\\\\\\\\[[[[\\\\\\\\\\\\]]]]]]
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
