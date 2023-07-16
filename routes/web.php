<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');
Route::get('/search', [HomeController::class, "search"])->name('search');

// Route::get('/muro', function(){
//     $posts = Post::all();
//     return view('muro', ["posts" => $posts]);
// })->name('muro');

Route::get('/editar-perfil', [PerfilController::class, "index"])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, "store"]);


Route::get('/register', [RegisterController::class, "index"])->name('register');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/login', [LoginController::class, "index"])->name('login');
Route::post('/login', [LoginController::class, "store"]);
Route::post('/logout', [LogoutController::class, "store"])->name('logout');



Route::get('/posts/create', [PostController::class, "create"])->name("posts.create");
Route::get('/{user:username}', [PostController::class, "index"])->name('posts.index');
Route::post('/images', [ImageController::class, "store"])->name('images.store');
Route::post('/posts', [PostController::class, "store"])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, "show"])->name('posts.show');
Route::post('/{user:username}/posts/{post}', [CommentController::class, "store"])->name('comment.store');
Route::delete('/posts/{post}', [PostController::class, "destroy"])->name('posts.delete');
Route::post('/posts/{post}/likes', [LikeController::class, "store"])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, "destroy"])->name('posts.likes.destroy');



// follow
Route::post('/{user:username}/follow', [FollowerController::class, "store"])->name('follow.store');
Route::delete('/{user:username}/follow', [FollowerController::class, "destroy"])->name('follow.destroy');