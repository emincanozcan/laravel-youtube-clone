<?php

use App\Models\Video;
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

Route::get('/watch/{video}', function (Video $video) {
    $video->increment('view_count');
    return view('watch.show', compact('video'));
})->name('watch.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/studio/upload', fn() => view('studio.upload'))->name('studio.upload');
    Route::get('/studio/videos', fn() => view('studio.videos'))->name('studio.videos');

});
