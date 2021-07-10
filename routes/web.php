<?php

use Illuminate\Support\Facades\Route;
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
    $posts = Post::all();
    return view('posts', ['posts' => $posts]);
});

/**
 * Find a post by its path, pass it to the view 'post' and return the view.
 */
Route::get('posts/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', ['post' => $post]);
})->where('post', '[A-z_\-]+');
