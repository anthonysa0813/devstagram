<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
     public function index(){
        return view("auth.register");
    }

    public function store(Request $request){

        // Modificar el Reguest
        $request->request->add(['username' => Str::slug( $request->username)]);

        $this->validate($request, [
            'name' =>'required|min:5',
            'username' =>'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6' // confirmed verfica que el campo de password y password_confirmation sean iguales
        ]);
        // primera forma de guardar datos
        User::create([
            'name' => $request->name,
            'username' => $request->username ,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // autenticar un usuario - retorna un boolean
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('posts.index', ["user" => auth()->user()->username]);
        // segunda forma de guardar datos
    }
}