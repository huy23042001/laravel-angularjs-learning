<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class newscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = news::all();
        return view('admin.news.index',['news'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new news;
        $db->title = $request->title;
        $db->content = $request->content;
        $db->image = "";
        $db->created_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/news');
    }
    public function add()
    {
        return view('admin.news.create',[]);
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
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = news::find($id);
        return view('admin.news.edit',['news'=>$db]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $db = news::find($request->id);
        $db->title = $request->title;
        $db->content = $request->content;
        $db->updated_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = news::find($id)->delete();
        return redirect()->to('/admin/news');
    }
}
