<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('create-post');
})->name('home');


Route::get('/posts', function () {
    return view('posts', [
        'posts' => DB::table('posts')->paginate(10)
    ]);
})->name('posts');

Route::get('/post/{id}', function ($id) {
    return view('post', [
        'post' => Post::findOrFail($id)
    ]);
})->name('posts-by-id');


Route::get('/delete-post/{id}', function ($id) {
    Post::destroy($id);
    return redirect('/posts');
})->name('delete-post');


Route::post('/create-post', function (Request $request) {
    $id = DB::table('posts')->insertGetId([
        // 'title' => $request->input('title'),
        'body' => $request->input('body'),
    ]);
    return redirect()->route('posts-by-id', ['id' => $id]);
})->name('create-post');

Route::get('/update-post/{id}', function ($id) {
    return view('create-post', [
        'post' => Post::findOrFail($id)
    ]);
})->name('update-post-form');

Route::post('/update-post/{id}', function (Request $request) {
    $id = $request->route('id');
    $post = Post::findOrFail($id);
    $post->body = $request->input('body');
    $post->save();
    return redirect()->route('posts-by-id', ['id' => $id]);
})->name('update-post');
