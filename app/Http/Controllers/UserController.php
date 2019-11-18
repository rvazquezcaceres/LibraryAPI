<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use App\Helper\Token;

class UserController extends Controller
{
    private $key = "example-key";
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
        $user = new User();
        $user->register($request);

        $data_token = [
            "email" => $user->email,
        ];
        $token = new Token($data_token);
        $tokenCode = $token->encode();

        return response()->json([
            "token" => $tokenCode
        ], 201);
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
    
        $users = User::all('email', 'password');
        $this->token = new Token();
        $tokenCode = $this->token->encode();
        foreach ($users as $key => $user)
        {
            //var_dump($user);
            if (($request->email == $user->email) && ($request->password == $user->password))
            {
                return response()->json([
                    "token" => $tokenCode
                ], 201);
            }
            else
            {
                print(" No ");
            }
        }

        /*
        User::find();
        Buscar el usuario por email 
        Comprobas que user  de request y email y password de user son iguales
        si son iguales tengo que codificar el token 
        despues devolver la respuesta json con el token y un codigo 200
        si son iguales devolver la respuesta json con codigo 401
        */

    }
}