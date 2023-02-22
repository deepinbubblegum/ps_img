<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Take_img;

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

Route::post('/take', [Take_img::class, 'main']);

Route::get('/mobile', function () {
    return view('mobile');
});

Route::get('/', function () {
    // return view('welcome');
    // return view('view_img_5.home');
    return view('view_signin.welcome');
});

Route::get('/qrscan', function () {
    // return view('welcome');
    return view('view_signin.qrscan_signin');
});

Route::get('/home', function () {
    // return view('welcome');
    return view('view_img_5.home');
});


Route::get('/img_5_takephoto', function () {
    return view('view_img_5.img_5_takephoto');
});


Route::get('/preview_video', function () {
    return view('view_img_5.preview_video');
});


Route::get('/preview_photo', function () {
    return view('view_img_5.preview_photo');
});



Route::get('/emoji', function () {
    return view('emoji');
});


// ------------------------IMG 8

Route::get('picture_8', function () {
    // return view('welcome');
    return view('view_img_8.img_8_home');
});


Route::get('/img_8_takephoto', function () {
    return view('view_img_8.img_8_takephoto');
});


Route::get('/preview_video_8', function () {
    return view('view_img_8.preview_video_8');
});

Route::get('/preview_photo_8', function () {
    return view('view_img_8.preview_photo_8');
});



// ------------------------Video

Route::get('/video', function () {
    // return view('welcome');
    return view('video.4k_home');
});


Route::get('/4k_takephoto', function () {
    // return view('welcome');
    return view('video.4k_takephoto');
});

Route::get('/4k_preview', function () {
    // return view('welcome');
    return view('video.4k_preview');
});