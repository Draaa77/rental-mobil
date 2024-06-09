<?php

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

Route::get('/home', function() {
    return view('view_home');
});

Route::get('/mobil', 'MobilController@mobiltampil');
Route::post('/mobil/tambah', 'MobilController@mobiltambah');
Route::get('/mobil/hapus/{id_mobil}', 'MobilController@mobilhapus');
Route::put('/mobil/edit/{id_mobil}', 'MobilController@mobiledit');

Route::get('/peminjam', 'PeminjamController@peminjamtampil');
Route::post('/peminjam/tambah', 'PeminjamController@peminjamtambah');
Route::get('/peminjam/hapus/{id_peminjam}', 'PeminjamController@peminjamhapus');
Route::put('/peminjam/edit/{id_peminjam}', 'PeminjamController@peminjamedit');

Route::get('/info', 'InfoController@infotampil');
Route::post('/info/tambah', 'InfoController@infotambah');
Route::get('/info/hapus/{id_info}', 'InfoController@infohapus');
Route::put('/info/edit/{id_info}', 'InfoController@infoedit');