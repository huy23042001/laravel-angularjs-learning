<?php

namespace App\Http\Controllers;

use App\Models\bills_ban;
use App\Models\khach_hang;
use Illuminate\Http\Request;

class bills_bancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = bills_ban::all();
        $kh = khach_hang::all();
        return view('admin.billban.index', ['bill'=>$bill, 'kh'=>$kh]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new bills_ban;
        $db->id_kh=$request->kh;
        $time = strtotime($request->date);
        $newformat = date('Y-m-d',$time);
        $db->date_order = $newformat;
        $db->tong_tien = 0;
        $db->payment = 'on';
        $db->status = $request->status;
        $db->note = $request->note;
        $db->save();
        return $db;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
       
        $kh = khach_hang::all();
        return view('admin.billban.add', ['kh'=>$kh]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = bills_ban::find($id);
        $kh = khach_hang::all();
        return view('admin.billban.edit',['bill'=>$bill, 'kh'=>$kh]);
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
    public function update(Request $request, $id)
    {
        $db = bills_ban::find($id);
        $db->id_kh=$request->kh_id;
        $time = strtotime($request->date);
        $newformat = date('Y-m-d',$time);
        $db->date_order = $newformat;
        $db->status = $request->status;
        $db->note = $request->note;
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = bills_ban::find($id);
        $db->delete();
        return $db;
    }
}