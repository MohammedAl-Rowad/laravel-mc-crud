<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

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

Route::get('/', function () {
    return view('create-post');
})->name('home');

Route::post('/create-post', function (Request $request) {
    $id = DB::table('posts')->insertGetId([
        'body' => $request->input('body'),
        'title' => $request->input('title'),
    ]);
    return redirect()->route('home');
})->name('create-post');


Route::get('/posts', function () {
    return view('posts', [
        'posts' => DB::table('posts')->paginate(10)
    ]);
})->name('posts');


Route::get('/post/{id}', function ($id) {
    return view('post', [
        'post' => Post::findOrFail($id)
    ]);
})->name('post-by-id');


Route::get('/update-post/{id}', function ($id) {
    return view('create-post', [
        'post' => Post::findOrFail($id)
    ]);
})->name('update-post-form');


Route::post('/update-post/{id}', function (Request $request) {
    $id = $request->route('id');
    $post = Post::findOrFail($id);
    $post->body = $request->input('body');
    $post->title = $request->input('title');
    $post->save();
    return redirect()->route('post-by-id', ['id' => $id]);
})->name('update-post');


Route::get('/delete-post/{id}', function ($id) {
    Post::destroy($id);
    return redirect()->route('home');
})->name('delete-post');


// delete resource -> Route::delete
// update resource -> Route::patch
// create resource -> Route::post
// get resource -> Route::get

// change the resource completly resource -> Route::put
