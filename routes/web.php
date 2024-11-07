<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;

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


Route::post('/toggle-theme', function () {
    $theme = session('theme', 'light') === 'dark' ? 'light' : 'dark';
    session(['theme' => $theme]);
    return back();
});

Route::fallback(function () {
    return view('auth/error-404');
});

// error 500
Route::get('/erro-500', function () {
    abort(500);
});

Route::group(['group' => '/', 'middleware' => 'auth'], function () {
    //    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn() => view('dashboard.index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
});