<?php

namespace App\Http\Controllers;

use App\Models\phan_hoi;
use App\Models\sanpham;
use App\Models\users;
use Illuminate\Http\Request;

class phan_hoicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = phan_hoi::all();
        $sanpham = sanpham::all();
        $users = users::all();
        return view('admin.phanhoi.index',['phanhoi'=>$db,'sanphams'=>$sanpham,'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new phan_hoi;
        $db->id_tk = $request->user;
        $db->id_sp = $request->sanpham;
        $db->level = $request->level;
        $db->note = $request->note;
        $db->created_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/phan_hoi');
    }
    public function add()
    {
        $sanpham = sanpham::all();
        $users = users::all();
        return view('admin.phanhoi.create',['sanphams'=>$sanpham,'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phan_hoi  $phan_hoi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = phan_hoi::find($id);
        $sanpham = sanpham::all();
        $users = users::all();
        return view('admin.phanhoi.edit',['phanhoi'=>$db,'sanphams'=>$sanpham,'users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phan_hoi  $phan_hoi
     * @return \Illuminate\Http\Response
     */
    public function edit(phan_hoi $phan_hoi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phan_hoi  $phan_hoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $db = phan_hoi::find($request->id_phan_hoi);
        $db->id_tk = $request->user;
        $db->id_sp = $request->sanpham;
        $db->level = $request->level;
        $db->note = $request->note;
        $db->updated_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/phan_hoi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phan_hoi  $phan_hoi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = phan_hoi::find($id)->delete();
        return redirect()->to('/admin/phan_hoi');
    }
}
