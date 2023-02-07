<?php

use App\Http\Controllers\AccountController;
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
    return view('index');
});

Route::get('/register', [AccountController::class, 'viewRegister']);
Route::post('/register', [AccountController::class, 'register']);

Route::get('/login', [AccountController::class, 'viewLogin']);
Route::post('/login', [AccountController::class, 'login']);
