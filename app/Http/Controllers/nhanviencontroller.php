<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use Illuminate\Http\Request;

class nhanviencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = nhanvien::all();
       // dd($db);
        return view('admin.nhanvien.index',['nhanvien'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new nhanvien;
        $db->ten_nhanvien=$request->ten_nhanvien;
        $db->quequan=$request->quequan;
        $db->ngaysinh=$request->ngaysinh;
        $db->gioitinh=$request->gioitinh;
        $db->email=$request->email;
        $db->sdt=$request->sdt;
        $db->capbac=$request->capbac;
        $db->created_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/nhanvien');
    }
    public function add()
    {
        return view('admin.nhanvien.create',[]);
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
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = nhanvien::find($id);
        return view('admin.nhanvien.edit',['nhanvien'=>$db]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $db = nhanvien::find($request->id);
        $db->ten_nhanvien=$request->ten_nhanvien;
        $db->quequan=$request->quequan;
        $db->ngaysinh=$request->ngaysinh;
        $db->gioitinh=$request->gioitinh;
        $db->email=$request->email;
        $db->sdt=$request->sdt;
        $db->capbac=$request->capbac;
        $db->updated_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/nhanvien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = nhanvien::find($id)->delete();
        return redirect()->to('/admin/nhanvien');
    }
}
