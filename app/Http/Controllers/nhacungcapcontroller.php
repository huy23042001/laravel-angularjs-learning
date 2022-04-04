<?php

namespace App\Http\Controllers;

use App\Models\nha_cung_cap;
use Illuminate\Http\Request;

class nhacungcapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brand = nha_cung_cap::all();
        return view('admin.nhacungcap.index', ['brand'=>$Brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new nha_cung_cap;
        $db->ten_ncc=$request->name;
        $db->diachi_ncc = $request->add;
        $db->email = $request->mail;
        $db->sdt = $request->phone;
        $db->Delet = 1;
        $db->save();
        return redirect()->to('/admin/nhacungcap');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.nhacungcap.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = nha_cung_cap::find($id);
        return view('admin.nhacungcap.edit',['brand'=>$db]);
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
        $db = nha_cung_cap::find($request->id);
        $db->ten_ncc=$request->name;
        $db->diachi_ncc = $request->add;
        $db->email = $request->mail;
        $db->sdt = $request->phone;
        $db->save();
        return redirect()->to('/admin/nhacungcap');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = nha_cung_cap::find($id);
        $db->delete();
        return redirect()->to('/admin/nhacungcap');
        
    }
}
