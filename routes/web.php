<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Frontend\FrontendController;
use App\http\Controllers\Frontend\ShopController;
use App\http\Controllers\Frontend\CartController;
use App\http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\KategoriController;
use App\http\Controllers\Backend\LoginController;
use Illuminate\Routing\Router;
use PHPUnit\Framework\Constraint\LogicalOr;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home',[FrontendController::class,'index'] );
Route::get('/shop',[ShopController::class,'index'] );
Route::get('/cart',[CartController::class,'index'] );

Route::get('/index',[BackendController::class,'index'] );
Route::get('/login',[LoginController::class,'index'] );
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout']);
Route::get('/kategori', [KategoriController::class, 'index']);
