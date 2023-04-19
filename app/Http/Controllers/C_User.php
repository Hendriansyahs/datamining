<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Pengujian;
use App\Models\M_User;

class C_User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataUser()
    {
        $dataUser = M_User::all();
        $du = ['dataUser' => $dataUser];
       return view('main.user.userdata', $du); 
    }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function prosesTambahUser(Request $request)
    {
        // {'nama':nama, 'harga':harga, 'kategori':kategori}
        $user = new M_User();
        $user -> username = $request -> username;
        $user -> role = $request -> role;
        $user -> password = password_hash($request -> password, PASSWORD_DEFAULT);
        $user -> active = "1";
        $user -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

     public function getDataUserRes(Request $request)
    {
        $dataUser = M_User::where('id', $request -> id) -> first();
        // $dr = ['status' => 'sukses'];
        return \Response::json($dataUser);
    }
     public function prosesUpdateUser(Request $request)
    {
        // {'kdProduk':kdProduk, 'nama':nama, 'harga':harga, 'kategori':kategori}
        M_User::where('id', $request -> id) -> update([
            'username' => $request -> username,
            'role' => $request -> role,
            'password' => $request -> kategori
        ]);
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function prosesHapusUser(Request $request)
    {
        M_User::where('id', $request -> id) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

}
