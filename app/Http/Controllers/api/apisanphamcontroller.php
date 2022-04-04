<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\loaisp;
use \Datetime;
use Illuminate\Support\Facades\DB;

class apisanphamcontroller extends Controller
{
    public function index()
    {
        $sanphams = sanpham::with('loaisp')->get();
        return ['sanphams'=>$sanphams];
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
        $db = new sanpham();
        $db->name = $request->name;
        $db->mota_sp = $request->name;
        $db->id_ncc=$request->id_ncc;
        $db->Delet=1;
        $db->so_luong=$request->so_luong;
        $db->id_loai_sp = $request->id_loai_sp;
        $db->unit_price = $request->unit_price;
        $db->created_at = new Datetime();
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
        // $sanphams = DB::table('san_pham')
        //     ->join('loai_sp', 'san_pham.id_loai_sp', '=', 'loai_sp.id')// joining the contacts table , where user_id and contact_user_id are same
        //     ->join('nha_cung_cap', 'san_pham.id_ncc', '=', 'nha_cung_cap.id')// joining the contacts table , where user_id and contact_user_id are same
        //     ->where('san_pham.id',$id)
        //     ->select('san_pham.*', 'loai_sp.id','nha_cung_cap.id')
        //     ->get();
        return sanpham::all();
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
        $db = sanpham::find($id);
        $db->name = $request->name;
        $db->mota_sp = $request->name;
        $db->id_ncc=$request->id_ncc;
        $db->Delet=1;
        $db->so_luong=$request->so_luong;
        $db->id_loai_sp = $request->id_loai_sp;
        $db->unit_price = $request->unit_price;
        $db->created_at = new Datetime();
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
        sanpham::findOrFail($id)->delete();
        return "Deleted";
    }
}