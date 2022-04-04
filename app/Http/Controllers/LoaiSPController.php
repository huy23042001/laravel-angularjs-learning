<?php

namespace App\Http\Controllers;

use App\Models\loaisp;
use App\Models\sanpham;
use Illuminate\Http\Request;

class LoaiSPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = loaisp::all();
        return view('admin.loaisp.index',['loaisps'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new loaisp;
        $db->tenloai = $request->tenloai;
        $db->Delet = $request->Delet;
        $db->save();
        return redirect()->to('/admin/LoaiSP');
    }
    public function add()
    {
        return view('admin.loaisp.create',[]);
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
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = loaisp::find($id);
        return view('admin.loaisp.edit',['loaisp'=>$db]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function edit(loaisp $loaisp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $db = loaisp::find($request->id);
        $db->tenloai = $request->tenloai;
        $db->Delet = $request->Delet;
        $db->save();
        return redirect()->to('/admin/LoaiSP');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = loaisp::find($id)->delete();
        $db = sanpham::where('id_loai_sp',$id)->delete();
        return redirect()->to('/admin/LoaiSP');
    }
}
