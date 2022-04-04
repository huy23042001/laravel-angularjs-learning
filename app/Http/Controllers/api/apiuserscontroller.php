<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use \DateTime;

class apiuserscontroller extends Controller
{
    public function index()
    {;
        return users::all();
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
        $db = new users();
        $db->users_name = $request->users_name;
        $db->password = $request->password;
        $db->full_name=$request->full_name;
        $db->email=$request->email;
        $db->phone=$request->phone;
        $db->Delet=1;
        $db->address=$request->address;
        $db->image = "a.jpg";
        $db->remember_token = "";
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
        return users::findOrFail($id);
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
        $db = users::find($id);
        $db->users_name = $request->users_name;
        $db->password = $request->password;
        $db->full_name=$request->full_name;
        $db->email=$request->email;
        $db->phone=$request->phone;
        $db->Delet=1;
        $db->address=$request->address;
        $db->image = "a.jpg";
        $db->remember_token = "";
        $db->updated_at = new Datetime();
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
        users::findOrFail($id)->delete();
        return "Deleted";
    }
    
}
