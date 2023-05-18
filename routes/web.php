<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Http\Controllers\TodoController;
use App\Models\Todo;

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

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/store_auth',[AuthController::class,'store'])->name('store_auth');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => 'checkuserid'],function(){
//Todo
Route::get('index',[TodoController::class,'index'])->name('index');
Route::post('store',[TodoController::class,'store'])->name('store');
Route::get('{id}/edit',[TodoController::class,'edit'])->name('edit');
Route::get('{id}/destroy',[TodoController::class,'destroy'])->name('destroy');
Route::put('{id}/update',[TodoController::class,'update'])->name('update');

});
