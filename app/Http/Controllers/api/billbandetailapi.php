<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bill_detail_ban;
use App\Models\sanpham;
use App\Models\bills_ban;
class billbandetailapi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = bill_detail_ban::with('bills_ban', 'sanpham')->get();
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
        $db = new bill_detail_ban;
        $db->id_bill_ban=$request->id_bill_ban;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->save();
        
        $sp = sanpham::find($request->id_sp);
        $sp->so_luong-=$request->sl;
        $bill = bills_ban::find($request->id_bill_ban);
        $bill->tong_tien += $request->sl*$sp->unit_price;
        $bill->save();
        $sp->save();
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
        $detail = bill_detail_ban::find($request->id);
        $bill = bills_ban::find($detail->id_bill_ban);
        $sanpham = sanpham::find($detail->id_sp);
        
        if($bill->id != $request->bill){
            $new_bill = bills_ban::find($request->id_bill_ban);
            $bill->tong_tien -= $detail->sl * $sanpham->unit_price;
            $new_bill->tong_tien+= $request->quan*$sanpham->unit_price;
            $new_bill->save();
            $detail->id_bill_ban = $request->id_bill_ban;
        }else{
            $bill->tong_tien += ($request->sl - $detail->sl)*$sanpham->unit_price;
        }

        if($sanpham->id != $request->id_sp){
            $new_sp = sanpham::find($request->id_sp);
            $new_sp->so_luong-= $request->sl;
            $sanpham->so_luong += $detail->sl;
            $new_sp->save();
        } else {
            $sanpham->so_luong -= ($request->sl - $detail->sl);
        }

        $bill->save();
        $sanpham->save();
        $detail->sl = $request->sl;
        $detail->save();
        return $detail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = bill_detail_ban::find($id);
        $bill = bills_ban::find($db->id_bill_ban);
        $sanpham = sanpham::find($db->id_sp);
        $bill->tong_tien -= $sanpham->unit_price*$db->sl;
        $sanpham->so_luong += $db->sl;
        $bill->save();
        $sanpham->save();
        $db->delete();
        return $db;
    }
}
