<?php

use App\Http\Controllers\Admin\CourseTagController;
use App\Http\Controllers\SupportController;
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

Route::get('/',function (){
    return redirect(route('admin.dashboard'));
});
//Route::get('/dashboard',function (){
//    return redirect(route('admin.dashboard'));
//});
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::prefix('admin/')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/form-example', function () {
        return view('pages.admin.example.form-generator');
    })->name('form-example');

    Route::get('/table-example', function () {
        return view('pages.admin.example.table-generator');
    })->name('table-example');

    Route::resource('course-tag', CourseTagController::class)->only('index','create','edit');
});



