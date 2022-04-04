<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bills_detail_nhap;
use App\Models\bills_nhap;
use App\Models\sanpham;

class billnhapdetailapi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = bills_detail_nhap::with('bills_nhap', 'sanpham')->get();
        return $detail;
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
        $db = new bills_detail_nhap;
        $db->id_bill_nhap=$request->id_bill_nhap;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->don_vi = $request->don_vi;
        $db->save();
        
        $sp = sanpham::find($request->id_sp);
        $sp->so_luong+=$request->sl;
        $bill = bills_nhap::find($request->id_bill_nhap);
        $bill->tong_tien += $request->sl*$sp->unit_price;
        $bill->save();
        $sp->save();
        return $db->with('bills_nhap', 'sanpham')->get()->sortByDesc('id')->first();
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
        $detail = bills_detail_nhap::find($id);
        $bill = bills_nhap::find($detail->id_bill_nhap);
        $sanpham = sanpham::find($detail->id_sp);
        
        if($bill->id != $request->id_bill_nhap){
            $new_bill = bills_nhap::find($request->id_bill_nhap);
            $bill->tong_tien -= $detail->sl * $sanpham->unit_price;
            $new_bill->tong_tien+= $request->sl*$sanpham->unit_price;
            $new_bill->save();
            $detail->id_bill_nhap = $request->id_bill_nhap;
        }else{
            $bill->tong_tien += ($request->sl - $detail->sl)*$sanpham->unit_price;
        }

        if($sanpham->id != $request->id_sp){
            $new_sp = sanpham::find($request->id_sp);
            $new_sp->so_luong += $request->sl;
            $sanpham->so_luong -= $detail->sl;
            $new_sp->save();
        } else {
            $sanpham->so_luong += ($request->sl - $detail->sl);
        }

        $bill->save();
        $sanpham->save();
        $detail->sl = $request->sl;
        $detail->don_vi = $request->don_vi;
        $detail->save();
        return $detail->with('bills_nhap', 'sanpham')->get()->find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = bills_detail_nhap::find($id);
        $bill = bills_nhap::find($db->id_bill_nhap);
        $sanpham = sanpham::find($db->id_sp);
        $bill->tong_tien -= $sanpham->unit_price*$db->sl;
        $sanpham->so_luong -= $db->sl;
        $bill->save();
        $sanpham->save();
        $db->delete();
        return $db;
    }
}
