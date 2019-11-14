<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class User extends Model
{
    //private $request;
    //private $user;

    /*public function _construct(Request $request) 
    {
        $this->request = $request;
        $this->user = new User();
    }*/
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
    
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
    }
}
