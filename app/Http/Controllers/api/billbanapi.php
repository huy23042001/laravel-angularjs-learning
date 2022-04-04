<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bills_ban;
use App\Models\khach_hang;

class billbanapi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = bills_ban::with('khach_hang')->get();
        return $bill;
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
    public function store(Request $request)
    {
        $db = new bills_ban;
        $db->id_kh=$request->id_kh;
        $time = strtotime($request->date_order);
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
        $db = bills_ban::find($id);
        $db->id_kh=$request->id_kh;
        $time = strtotime($request->date_order);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = bills_ban::find($id);
        $db->delete();
        return $db;
    }
}
