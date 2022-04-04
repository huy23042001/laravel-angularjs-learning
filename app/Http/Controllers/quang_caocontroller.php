<?php

namespace App\Http\Controllers;

use App\Models\quang_cao;
use Illuminate\Http\Request;

class quang_caocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = quang_cao::all();
        return view('admin.quangcao.index',['quangcao'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new quang_cao;
        $db->image = $request->image;
        $db->note = $request->note;
        $db->tittle = $request->title;
        $db->created_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/quang_cao');
    }
    public function add()
    {
        return view('admin.quangcao.create',[]);
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
     * @param  \App\Models\quang_cao  $quang_cao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = quang_cao::find($id);
        return view('admin.quangcao.edit',['quangcao'=>$db]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quang_cao  $quang_cao
     * @return \Illuminate\Http\Response
     */
    public function edit(quang_cao $quang_cao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quang_cao  $quang_cao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $db = quang_cao::find($request->id);
        $db->image = $request->image;
        $db->note = $request->note;
        $db->tittle = $request->title;
        $db->updated_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/quang_cao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quang_cao  $quang_cao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = quang_cao::find($id)->delete();
        return redirect()->to('/admin/quang_cao');
    }
}
