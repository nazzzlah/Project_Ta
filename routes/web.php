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
Route::get('/shop',[ShopController::class,'index'] );
Route::get('/shopdetail',[ShopDetailController::class,'index'] );
// Route::get('/shopdetail/{id}', [ShopDetailController::class, 'index'])->name('product.show');

// Route::get('/cart',[CartController::class,'index'] );

Route::get('/index',[BackendController::class,'index'] );
Route::get('/login',[LoginController::class,'index'] );
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/signup', [LoginController::class, 'signup']);
Route::resource('/kategori', KategoriController::class);
Route::resource('/product', ProductController::class);
Route::resource('/pesanan', PesananController::class);
Route::resource('/transaksi', TBController::class);


// Route::post('/addtocart', [CartItemController::class,'addToCart']);
Route::get('/cart', [CartItemController::class, 'showCart'])->name('cart.show');
Route::get('/checkout/{id}',[CheckoutController::class,'index'] );
// Route::Post('/checkout',[CheckoutController::class,'store'] );

Route::post('/add-to-cart/{product}', [CartItemController::class,'addToCart']);
Route::patch('/cart/update/{cartItem}', [CartItemController::class, 'update'])->name('cart.update');
Route::patch('/cart/destroy/{cartItem}', [CartItemController::class, 'destroy'])->name('cart.destroy');

Route::get('/cart/total', [CartItemController::class, 'calculateTotalCartPrice'])->name('cart.total');

// PESANAN
Route::post('simpan-pesanan', [CartController::class, 'simpan_pesanan']);
Route::post('simpan-checkout', [CheckoutController::class, 'store']);
Route::post('simpan-transaksi', [TransaksiController::class, 'store']);
Route::get('transaksi-frontend/{id}', [TransaksiController::class, 'index']);

Route::resource('/riwayat', FrontendRiwayatController::class);
Route::get('/print/{id}', [FrontendRiwayatController::class,'print']);
Route::post('/riwayat/{id}', [FrontendRiwayatController::class,'update']);


Route::post('/update-status/{id}', [PesananController::class, 'updateStatus'])->name('update.status');








