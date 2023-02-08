<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\App;
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

Route::get('/register', [AccountController::class, 'viewRegister'])->middleware('logout');
Route::post('/register', [AccountController::class, 'register'])->middleware('logout');
Route::get('/login', [AccountController::class, 'viewLogin'])->middleware('logout');
Route::post('/login', [AccountController::class, 'login'])->middleware('logout');
Route::post('/logout', [AccountController::class, 'logout'])->middleware('login');
Route::get('/profile', [AccountController::class, 'viewProfile'])->middleware('login');
Route::patch('/editProfile', [AccountController::class, 'editProfile'])->middleware('login');
Route::get('/view-account-maintenance', [AccountController::class, 'viewAccountMaintenance'])->middleware('admin');
Route::get('/view-update-role/{id}', [AccountController::class, 'viewUpdateRole'])->middleware('admin');
Route::post('/update-role', [AccountController::class, 'updateRole'])->middleware('admin');
Route::delete('/delete-account/{id}', [AccountController::class, 'deleteAccount'])->middleware('admin');

Route::get('/home', [ItemController::class, 'viewHome'])->middleware('login');
Route::get('/detail/{id}', [ItemController::class, 'viewDetail'])->middleware('login');
Route::get('/cart', [ItemController::class, 'viewCart'])->middleware('login');
Route::post('/add-to-cart/{id}', [ItemController::class, 'addToCart'])->middleware('login');
Route::delete('/remove-from-cart', [ItemController::class, 'remove'])->middleware('login');

Route::post('/checkout', [OrderController::class, 'checkout'])->middleware('login');
