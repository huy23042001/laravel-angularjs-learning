<?php

namespace App\Http\Controllers;

use App\Models\bills_nhap;
use App\Models\nhanvien;
use App\Models\nha_cung_cap;
use Illuminate\Http\Request;

class bills_nhapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brand = bills_nhap::all();
        $nhanvien = nhanvien::all();
        $nhacc = nha_cung_cap::all();
        return view('admin.billnhap.index', ['bill'=>$Brand, 'ncc'=>$nhacc, 'nv'=>$nhanvien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new bills_nhap;
        $db->id_ncc=$request->ncc;
        $db->id_nhanvien = $request->nv;
        $time = strtotime($request->date);
        $newformat = date('Y-m-d',$time);
        $db->date_order = $newformat;
        $db->tong_tien = 0;
        $db->thanh_toan = 'on';
        $db->note = $request->note;
        $db->save();
        return redirect()->to('/admin/billnhap');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $bill = bills_nhap::all();
        $nhanvien = nhanvien::all();
        $nhacc = nha_cung_cap::all();
        return view('admin.billnhap.add', ['bill'=>$bill, 'ncc'=>$nhacc, 'nv'=>$nhanvien]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = bills_nhap::find($id);
        $nhanvien = nhanvien::all();
        $nhacc = nha_cung_cap::all();
        return view('admin.billnhap.edit',['bill'=>$bill, 'ncc'=>$nhacc, 'nv'=>$nhanvien]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $Brand)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $db = bills_nhap::find($request->id);
        $db->id_ncc=$request->ncc;
        $db->id_nhanvien = $request->nv;
        $time = strtotime($request->date);
        $newformat = date('Y-m-d',$time);
        $db->date_order = $newformat;
        $db->note = $request->note;
        $db->save();
        return redirect()->to('/admin/billnhap');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = bills_nhap::find($id);
        $db->delete();
        return redirect()->to('/admin/billnhap');
        
    }
}
