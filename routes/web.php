<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dep', function () {
    return view('departments.dep1');
})->name('departments1');
Route::get('/deplist', [DepartmentController::class, 'deplist'])->name('deplist');



Route::middleware('auth')->group(function () {
        //Department routes
        Route::controller(DepartmentController::class)->group(function () {
            route::get('/departments', 'index')->name('departments');
            route::prefix('/department')->group(function () {
                Route::delete('/{id}', 'destroy')->name('department_delete');
                Route::post('/store', 'store');
                Route::put('/{id}', 'update');
            });
        });

});
