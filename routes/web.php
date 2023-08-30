<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Frontend\FrontendController;
use App\http\Controllers\Frontend\ShopController;
use App\http\Controllers\Frontend\CartController;
use App\http\Controllers\Frontend\CartItemController;
use App\http\Controllers\Frontend\CheckoutController;
use App\http\Controllers\Frontend\ShopDetailController;
use App\http\Controllers\Backend\BackendController;
use App\http\Controllers\Backend\PesananController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\ProductController;
use App\http\Controllers\Backend\LoginController;
use App\http\Controllers\Backend\TBController;
use App\Http\Controllers\Fontend\RiwayatController;
use App\Http\Controllers\frontend\RiwayatController as FrontendRiwayatController;
use App\Http\Controllers\Frontend\TransaksiController;

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
Route::get('/shop',[ShopController::class,'index'] )->middleware('auth');
Route::get('/shopdetail/{id}',[ShopDetailController::class,'index'] )->middleware('auth');
// Route::get('/shopdetail/{id}', [ShopDetailController::class, 'index'])->name('product.show');

// Route::get('/cart',[CartController::class,'index'] );

Route::get('/index',[BackendController::class,'index'] )->middleware('auth');
Route::get('/login',[LoginController::class,'index'] )->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/signup', [LoginController::class, 'signup']);
Route::resource('/kategori', KategoriController::class)->middleware('auth');
Route::resource('/product', ProductController::class)->middleware('auth');
Route::resource('/pesanan', PesananController::class)->middleware('auth');
Route::resource('/transaksi', TBController::class)->middleware('auth');


// Route::post('/addtocart', [CartItemController::class,'addToCart']);
Route::get('/cart', [CartItemController::class, 'showCart'])->name('cart.show')->middleware('auth');
Route::get('/checkout/{id}',[CheckoutController::class,'index'] )->middleware('auth');
// Route::Post('/checkout',[CheckoutController::class,'store'] );

Route::post('/add-to-cart/{product}', [CartItemController::class,'addToCart'])->middleware('auth');
Route::patch('/cart/update/{cartItem}', [CartItemController::class, 'update'])->name('cart.update')->middleware('auth');
Route::patch('/cart/destroy/{cartItem}', [CartItemController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

Route::get('/cart/total', [CartItemController::class, 'calculateTotalCartPrice'])->name('cart.total')->middleware('auth');

// PESANAN
Route::post('simpan-pesanan', [CartController::class, 'simpan_pesanan'])->middleware('auth');
Route::post('simpan-checkout', [CheckoutController::class, 'store'])->middleware('auth');
Route::post('simpan-transaksi', [TransaksiController::class, 'store'])->middleware('auth');
Route::get('transaksi-frontend/{id}', [TransaksiController::class, 'index'])->middleware('auth');

Route::resource('/riwayat', FrontendRiwayatController::class)->middleware('auth');
Route::get('/print/{id}', [FrontendRiwayatController::class,'print'])->middleware('auth');
Route::post('/riwayat/{id}', [FrontendRiwayatController::class,'update'])->middleware('auth');


Route::post('/update-status/{id}', [PesananController::class, 'updateStatus'])->name('update.status')->middleware('auth');








