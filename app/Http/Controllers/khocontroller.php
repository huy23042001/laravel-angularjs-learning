<?php

namespace App\Http\Controllers;

use App\Models\kho;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class khocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = kho::all();
        $sanpham = sanpham::all();
         return view('admin.kho.index',['kho'=>$db,'sanphams'=>$sanpham]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $db = new kho;
        // $db->id_sp = $request->id_sp;
        // $db->sl = $request->sl;
        // $db->save();
        DB::table('kho')->insert([
            'id_sp' => $request->sanpham,
            'sl' => $request->sl
        ]);
        return redirect()->to('/admin/kho');
    }
    public function add()
    {
        $sanpham = sanpham::all();
        return view('admin.kho.create',['sanpham'=>$sanpham]);
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
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = kho::find($id);
        $sanpham = sanpham::all();
        return view('admin.kho.edit',['kho'=>$db,'sanpham'=>$sanpham]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function edit(kho $kho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $db = kho::find($request->id);
        // $db->id_sp = $request->id_sp;
        // $db->sl = $request->sl;
        // $db->save();
        DB::table('kho')
              ->where('id', $request->id)
              ->update(['id_sp' => $request->sanpham,'sl' => $request->sl]);
        return redirect()->to('/admin/kho');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = kho::find($id)->delete();
        return redirect()->to('/admin/kho');
    }
}
