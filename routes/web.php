<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
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
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');

Route::get('admin/User', [App\Http\Controllers\HomeController::class, 'User_list'])->name('admin.User')->middleware('admin');

Route::post('admin/User_add', [App\Http\Controllers\HomeController::class, 'User_add'])->name('admin.User_add')->middleware('admin');

Route::post('/admin/User_adit', [App\Http\Controllers\HomeController::class, 'User_adit'])->name('admin.User_adit')->middleware('admin');

Route::post('admin/User_delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('admin.User_delete')->middleware('admin');

Route::get('admin/permission', [App\Http\Controllers\HomeController::class, 'permission'])->name('admin.permission')->middleware('admin');

Route::post('admin/update_permission', [App\Http\Controllers\HomeController::class, 'update_permission'])->name('admin/update_permission')->middleware('admin');

Route::get('admin/Program', [App\Http\Controllers\HomeController::class, 'Program'])->name('admin.Program')->middleware('admin');

Route::post('admin/Programfile', [App\Http\Controllers\HomeController::class, 'Programfile'])->name('admin.Programfile')->middleware('admin');

