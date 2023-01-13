<?php

use App\Http\Controllers\Admin\CourseTagController;
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
Route::get('/asda', function () {
    $data = [
        [3],
        [11, 2, 4],
        [4, 5, 6],
        [10, 5, -12],
    ];

    echo "Output1 <br>";
    for ($i = 0; $i <= $data[0][0]; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($j + 1 == $i) {
                if ($data[$i][$j]<10){
                    echo ".".$data[$i][$j];
                }else{
                    echo $data[$i][$j];
                }
            } else {
                echo ".. ";
            }
        }
        if ($i!=0){
            echo "<br>";
        }
    }
    echo "<br>Output2 <br>";

    for ($i = 1; $i <= $data[0][0]; $i++) {
        for ($j = 0; $j <= $data[0][0]-$i; $j++) {
            if ($j == $data[0][0]-$i) {
                if ($data[$i][$j]<10){
                        echo ".".$data[$i][$j];
                }else{
                    echo $data[$i][$j];
                }
            } else {
                echo ".. ";
            }
        }
//        if ($i!=0){
            echo "<br>";
//        }
    }

});
Route::get('/', function () {
    return redirect(route('admin.dashboard'));
});

Route::prefix('admin/')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
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

    Route::resource('course-tag', CourseTagController::class)->only('index', 'create', 'edit');
});



