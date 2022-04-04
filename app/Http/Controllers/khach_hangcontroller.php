<?php

namespace App\Http\Controllers;

use App\Models\khach_hang;
use Illuminate\Http\Request;

class khach_hangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brand = khach_hang::all();
        return view('admin.khachhang.index', ['kh'=>$Brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new khach_hang;
        $db->ten_kh=$request->name;
        $db->dia_chi = $request->add;
        $db->email = $request->mail;
        $db->sdt = $request->phone;
        $db->note = $request->note;
        $db->save();
        return redirect()->to('/admin/khachhang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.khachhang.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = khach_hang::find($id);
        return view('admin.khachhang.edit',['brand'=>$db]);
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
        $db = khach_hang::find($request->id);
        $db->ten_kh=$request->name;
        $db->dia_chi = $request->add;
        $db->email = $request->mail;
        $db->sdt = $request->phone;
        $db->note = $request->note;
        $db->save();
        return redirect()->to('/admin/khachhang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = khach_hang::find($id);
        $db->delete();
        return redirect()->to('/admin/khachhang');
        
    }
}

