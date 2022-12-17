<?php

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
    return redirect(\route('dashboard'));
});

Route::get('/aaa', function () {
    dd(\App\Repository\User::formField());
//    \App\Models\Tag::create(['title'=>'a','created_at' => \Carbon\Carbon::now(),'updated_at' => null]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
//        dd("ads");
        return view('pages.dashboard');
    })->name('dashboard');
});



