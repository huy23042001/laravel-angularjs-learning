<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class slidecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = slide::all();
        return view('admin.slide.index',['slide'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $db = new slide;
        // $db->link = $request->link;
        // $db->image = $request->image;
        // $db->save();
        DB::table('slide')->insert([
            'link' => $request->link,
            'image' => $request->image!=null?$request->image:""
        ]);
        return redirect()->to('/admin/slide');
    }
    public function add()
    {
        return view('admin.slide.create',[]);
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
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = slide::find($id);
        return view('admin.slide.edit',['slide'=>$db]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $db = slide::find($request->id);
        // $db->link = $request->link;
        // $db->image = $request->image;
        // $db->save();
        DB::table('slide')
              ->where('id_slide', $request->id)
              ->update(['link' => $request->link,'image' => $request->image!=null?$request->image:""]);
        return redirect()->to('/admin/slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = slide::find($id)->delete();
        return redirect()->to('/admin/slide');
    }
}
