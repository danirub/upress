<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowApAppleNewsController;



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
    Artisan::call('schedule:run');
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('posts', PostController::class);

Route::get('/apple-news', [ShowApAppleNewsController::class, 'index'])->name('apple.news');

Route::get('/trigger-scheduler', function () {
    Artisan::call('schedule:run');
    return 'Scheduler triggered!';
});

