<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function __invoke(){
        // $posts = Post::all();
        $ids = auth()->user()->following->pluck('id')->toArray()  ;
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);
        // dd($posts);
        return view('muro')->with('posts', $posts);
    }

    public function search(Request $request){
        if (request('search')) {
         $users = User::where('name', 'like', '%' . request('search') . '%')->get();
        return view('search')->with('users', $users);;
         }
    }
}