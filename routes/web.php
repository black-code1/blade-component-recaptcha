<?php

use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/posts/create', function () {
    return view('posts.create');
});

Route::post('/posts', function () {
    request()->validate([
        'title' => 'required',
        'body' => 'required',
        'g-recaptcha-response' => ['required', new Recaptcha]
    ]);
    dd('Validation passed and we are ready to create the post!');
});
