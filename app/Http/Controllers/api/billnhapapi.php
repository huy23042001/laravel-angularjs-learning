<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bills_nhap;
use App\Models\nhanvien;
use App\Models\nha_cung_cap;

class billnhapapi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = bills_nhap::with('nhanvien', 'nha_cung_cap')->get();
        return $brand;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return nhanvien::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new bills_nhap;
        $db->id_ncc=$request->id_ncc;
        $db->id_nhanvien = $request->id_nhanvien;
        $time = strtotime($request->date_order);
        $newformat = date('Y-m-d',$time);
        $db->date_order = $newformat;
        $db->tong_tien = 0;
        $db->thanh_toan = 'on';
        $db->note = $request->note;
        $db->save();
        return $db->with('nha_cung_cap', 'nhanvien')->get()->sortByDesc('id')->first();
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
        $db = bills_nhap::find($id);
        $db->id_ncc=$request->id_ncc;
        $db->id_nhanvien = $request->id_nhanvien;
        $time = strtotime($request->date_order);
        $newformat = date('Y-m-d',$time);
        $db->date_order = $newformat;
        $db->note = $request->note;
        $db->save();
        return $db->with('nha_cung_cap', 'nhanvien')->get()->find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = bills_nhap::find($id);
        $db->delete();
        return $db;
    }

   
}
