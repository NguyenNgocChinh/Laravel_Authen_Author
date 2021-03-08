<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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

Route::resource( 'product',ProductController::class);

Route::get('/', function (){
    return redirect('/product');
});

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


