<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function userStore(Request $request) //Inyeccion de dependencias
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();

        $key = "akqi38423rfnc2u323895f,34tc3tc·`43tc3";
        $data_token = [
            "email" => $users->email,
        ];

        $token = JWT::encode($data_token, $key);

        return response()->json([
            "token" => $token
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userShow(User $users)
    {
        $users = User::all();
        dd($users);
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

    public function login(Request $request)
    {
        $users = User::all('email');
        foreach ($users as $key => $user)
        {
            print($user->email);
            print($request->email);
            if ($request->email == $user->email)
            {
                print("hola");
            }
            else
            {
                print("No hay coincidencia");
            }
        }

        /*if ($request->email == $user->email)
        {
            print("hola");
        } else 
        {
            print("adios");
        }*/

        //$decoded = JWT::decode($token, $key, array('HS256'));
    }
}