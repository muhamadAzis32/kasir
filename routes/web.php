<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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


Route::get('/layout', [indexController::class, 'layout']);
Route::get('/view-login', [UserController::class, 'indexLogin'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);


//Akses yang memiliki level admin
Route::group(['middleware' => ['auth', 'cekLevel:Admin']], function () {
    
    //User
    Route::get('/user', [UserController::class, 'viewUser']);
    Route::get('/input-user', [UserController::class, 'inputUser']);
    Route::post('/save-user', [UserController::class, 'saveUser']);
    Route::get('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::post('/update-user/{id}', [UserController::class, 'updateUser']);
    Route::get('/hapus-user/{id}', [UserController::class, 'hapusUser']);

    //Kategori
    Route::get('/kategori', [KategoriController::class, 'viewKategori']);
    Route::post('/save-kategori', [KategoriController::class, 'saveKategori']);
    Route::get('/hapus-kategori/{id}', [KategoriController::class, 'hapusKategori']);
    Route::get('/edit-kategori/{id}', [KategoriController::class, 'edit']);
    Route::post('/update-kategori/{id}', [KategoriController::class, 'updateKategori']);

    //Member
    Route::get('/member', [MemberController::class, 'viewMember']);
    Route::get('/input-member', [MemberController::class, 'inputMember']);
    Route::post('/save-member', [MemberController::class, 'SaveMember']);
    Route::get('/edit-member/{id}', [MemberController::class, 'edit']);
    Route::post('/update-member/{id}', [MemberController::class, 'updateMember']);
    Route::get('/hapus-member/{id}', [MemberController::class, 'hapusMember']);

    //Produk
    Route::get('/produk', [ProdukController::class, 'viewProduk']);
    Route::get('/input-produk', [ProdukController::class, 'inputProduk']);
    Route::post('/save-produk', [ProdukController::class, 'saveProduk']);
    Route::get('/edit-produk/{id}', [ProdukController::class, 'edit']);
    Route::post('/update-produk/{id}', [ProdukController::class, 'updateProduk']);
    Route::get('/hapus-produk/{id}', [ProdukController::class, 'hapusProduk']);
});

//bisa di akses admin dan kasir
Route::group(['middleware' => ['auth', 'cekLevel:Admin,Kasir']], function () {

    Route::get('/index', [indexController::class, 'index']);
    //Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'viewTransaksi']);
    Route::get('/input-transaksi', [TransaksiController::class, 'inputTransaksi']);
    Route::post('/save-transaksi', [TransaksiController::class, 'saveTransaksi']);
    Route::get('/edit-transaksi/{id}', [TransaksiController::class, 'edit']);
    Route::post('/update-transaksi/{id}', [TransaksiController::class, 'updateTransaksi']);
    Route::get('/hapus-transaksi/{id}', [TransaksiController::class, 'hapusTransaksi']);
});
