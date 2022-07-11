<?php

// use App\Http\Controllers\ContohController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\RegisterController;
use App\Http\Livewire\Menu;
use App\Http\Controllers\LaukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TransaksiContoller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [HomeController::class, 'home'])->name('home');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::group(['middleware' => 'auth:user,admin'], function () {
    // Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('paket', PaketController::class);
    Route::resource('LaporanPenjualan', LaporanController::class);
    Route::resource('Lauk', LaukController::class);
    Route::get('/detail-paket/{id}', [HomeController::class, 'detailpaket'])->name('detail-paket');
    Route::get('tentang-kami', [HomeController::class, 'about'])->name('about');
    Route::get('profil/{id}/edit', [ProfilController::class, 'edit'])->name('edit.profil');
    Route::get('profil/{id}/detail', [ProfilController::class, 'detail'])->name('profil.detail');
    Route::put('profil/{id}', [ProfilController::class, 'update'])->name('profil.update');

    // Cart
    Route::post('/addtocart', [TransaksiContoller::class, 'addcart'])->name('addcart');
    Route::get('cart', [TransaksiContoller::class, 'cart'])->name('cart');
    Route::delete('cart/{id}', [TransaksiContoller::class, 'cartDelete'])->name('cart.delete');
    Route::put('cart/{id}', [TransaksiContoller::class, 'cartUpdate'])->name('cart.update');
    Route::get('cart/{id}/edit', [TransaksiContoller::class, 'cartEdit'])->name('cart.edit');

    // Checkout
    Route::get('checkout/add', [TransaksiContoller::class, 'checkout'])->name('checkout');
    Route::post('checkout/create', [TransaksiContoller::class, 'addCheckout'])->name('checkout.create');

    // Invoice
    Route::get('invoice', [TransaksiContoller::class, 'indexInvoice'])->name('invoice');
    Route::put('invoice/{id}/update', [TransaksiContoller::class, 'invoice'])->name('invoice.update');

    // Transaksi
    Route::get('transaksi', [TransaksiContoller::class, 'transaksi'])->name('transaksi.index');
    Route::get('transaksi/{id}/detail', [TransaksiContoller::class, 'transaksiDetail'])->name('transaksi.detail');

    // Pesan Sekarang
    Route::post('pesan-sekarang', [TransaksiContoller::class, 'pesanSekarang'])->name('pesan.sekarang');

    // Data Transaksi Admin
    Route::get('data-transaksi', [TransaksiContoller::class, 'dataTransaksi'])->name('data.transaksi');
    Route::get('data-transaksi/{id}/set-status', [TransaksiContoller::class, 'setStatus'])->name('set.status');
    Route::get('data-transaksi/{id}/detail', [TransaksiContoller::class, 'detailTransaksi'])->name('detail.data.transaksi');
});
