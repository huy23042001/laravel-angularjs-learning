<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = users::all();
        return view('admin.users.index',['users'=>$db]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $db = new users;
        $db->users_name = $request->users_name;
        $db->password = $request->password;
        $db->full_name = $request->full_name;
        $db->phone = $request->phone;
        $db->email = $request->email;
        $db->address = $request->address;
        $db->Delet = $request->Delet;
        $db->created_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/users');
    }
    public function add()
    {
        return view('admin.users.create',[]);
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
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = users::find($id);
        return view('admin.users.edit',['user'=>$db]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $db = users::find($request->id);
        $db->users_name = $request->users_name;
        $db->password = $request->password;
        $db->full_name = $request->full_name;
        $db->email = $request->email;
        $db->phone = $request->phone;
        $db->phone = $request->phone;
        $db->address = $request->address;
        $db->Delet = $request->Delet;
        $db->updated_at = date("Y-m-d H:i:s");
        $db->save();
        return redirect()->to('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = users::find($id)->delete();
        return redirect()->to('/admin/users');
    }
}
