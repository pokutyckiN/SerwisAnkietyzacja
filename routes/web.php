<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ProfesorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AnkietaController;
use App\Http\Controllers\Admin\PytaniaController;
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

Route::get('admin/users/home', [App\Http\Controllers\Admin\UsersController::class, 'home'])->name('adminhome');
//Route::get('admin/users/indexStudent', [App\Http\Controllers\Admin\UsersController::class, 'indexStudent'])->name('indexStudent');
//Route::get('admin/users/editStudent', [App\Http\Controllers\Admin\UsersController::class, 'editStudent'])->name('editStudent');
Route::resource('admin/users', UsersController::class)->except( 'create', 'store')->middleware('can:edit-users');


Route::resource('admin/students', StudentController::class)->middleware('can:manage-users');

Route::resource('admin/profesors', ProfesorController::class)->middleware('can:edit-users');

Route::resource('ankieta', AnkietaController::class);

Route::resource('admin/pytania', PytaniaController::class);


