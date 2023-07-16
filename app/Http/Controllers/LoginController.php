<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        // dd("cague de rii");
        return view('auth.login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' =>'required|email',
            'password' =>'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('messageError', 'Credenciales incorrectas');
        }

        $user = User::where('email', $request->only('email'))->first();

        // return redirect()->route('posts.index', ["user" => $user]);
        return redirect()->route('posts.index', auth()->user()->username );

    }
}