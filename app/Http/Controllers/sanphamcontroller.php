<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\loaisp;
use Illuminate\Http\Request;
use App\Models\nha_cung_cap;

class sanphamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = sanpham::all();
        $loaisp = loaisp::all();
        return view('admin.sanpham.index',['sanpham'=>$db,'loaisp'=>$loaisp]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new sanpham;
        $db->name = $request->name;
        $db->mota_sp = $request->mota_sp;
        $db->id_ncc = $request->brand;
        $db->id_loai_sp = $request->category;
        $db->so_luong = $request->quan;
        $db->Delet = 1;
        $db->save();
        return redirect()->to('/admin/sanpham');
    }
    public function add()
    {
        $loaisp = loaisp::all();
        $brand = nha_cung_cap::all();
        return view('admin.sanpham.create',['cat'=>$loaisp, 'brand'=>$brand]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = sanpham::find($id);
        $loaisp = loaisp::all();
        return view('admin.sanpham.edit',['sp'=>$db,'loaisp'=>$loaisp]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit(sanpham $sanpham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $db = sanpham::find($request->id);
        $db->name = $request->name;
        $db->mota_sp = $request->mota_sp;
        $db->save();
        return redirect()->to('/admin/sanpham');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = sanpham::find($id)->delete();
        return redirect()->to('/admin/sanpham');
    }
}
