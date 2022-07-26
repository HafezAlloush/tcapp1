<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::middleware('auth:sanctum')->group(function () {
//     // Route::prefix('/api')->group(function () {
//         //Department routes
//         Route::controller(DepartmentController::class)->group(function () {
//             route::get('/departments', 'index')->name('departments');
//             route::prefix('/department')->group(function () {
//                 Route::delete('/{id}', 'destroy')->name('department_delete');
//                 Route::post('/store', 'store');
//                 Route::put('/{id}', 'update');
//             });
//         });
//     // });
// });
