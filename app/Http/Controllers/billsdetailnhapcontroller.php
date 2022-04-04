<?php

namespace App\Http\Controllers;

use App\Models\bills_detail_nhap;
use App\Models\bills_nhap;
use App\Models\sanpham;
use Illuminate\Http\Request;

class billsdetailnhapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = bills_detail_nhap::all();
        $sanpham = sanpham::all();
        $bill = bills_nhap::all();
        return view('admin.billnhapdetail.index', ['detail'=>$detail, 'sp'=>$sanpham, 'bill'=>$bill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new bills_detail_nhap;
        $db->id_bill_nhap=$request->bill;
        $db->id_sp = $request->sp;
        $db->sl = $request->quan;
        $db->don_vi = $request->me;
        $db->save();
        
        $sp = sanpham::find($request->sp);
        $sp->so_luong+=$request->quan;
        $bill = bills_nhap::find($request->bill);
        $bill->tong_tien += $request->quan*$sp->unit_price;
        $bill->save();
        $sp->save();
        return redirect()->to('/admin/billnhapdetail');
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $sanpham = sanpham::all();
        $bill = bills_nhap::all();
        return view('admin.billnhapdetail.add', ['sp'=>$sanpham, 'bill'=>$bill]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = bills_nhap::all();
        $detail = bills_detail_nhap::find($id);
        $sanpham = sanpham::all();
        return view('admin.billnhapdetail.edit',['bill'=>$bill, 'detail'=>$detail, 'sp'=>$sanpham]);
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
        $detail = bills_detail_nhap::find($request->id);
        $bill = bills_nhap::find($detail->id_bill_nhap);
        $sanpham = sanpham::find($detail->id_sp);
        
        if($bill->id != $request->bill){
            $new_bill = bills_nhap::find($request->id_bill_nhap);
            $bill->tong_tien -= $detail->sl * $sanpham->unit_price;
            $new_bill->tong_tien+= $request->quan*$sanpham->unit_price;
            $new_bill->save();
            $detail->id_bill_nhap = $request->bill;
        }else{
            $bill->tong_tien += ($request->quan - $detail->sl)*$sanpham->unit_price;
        }

        if($sanpham->id != $request->sp){
            $new_sp = sanpham::find($request->sp);
            $new_sp->so_luong += $request->quan;
            $sanpham->so_luong -= $detail->sl;
            $new_sp->save();
        } else {
            $sanpham->so_luong += ($request->quan - $detail->sl);
        }

        $bill->save();
        $sanpham->save();
        $detail->sl = $request->quan;
        $detail->save();
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
        $db = bills_detail_nhap::find($id);
        $bill = bills_nhap::find($db->id_bill_nhap);
        $sanpham = sanpham::find($db->id_sp);
        $bill->tong_tien -= $sanpham->unit_price*$db->sl;
        $sanpham->so_luong -= $db->sl;
        $bill->save();
        $sanpham->save();
        $db->delete();
        return redirect()->to('/admin/billnhap');
        
    }
}

