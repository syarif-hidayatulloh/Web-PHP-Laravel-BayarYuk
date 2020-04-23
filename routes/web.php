<?php

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

// Home BayarYuk
Route::get('/', function () {return view('welcome');});

// == Login ==
Route::post('login/siswa','LoginController@loginSiswaPost');
Route::post('login/petugas','LoginController@loginPetugasPost');

// == Logout ==
Route::get('logout','LoginController@logoutPost');

// == Admin ==
// Data Petugas
Route::post('admin/petugas','Petugas\Admin\PetugasController@tambahPetugasPost');
Route::patch('admin/petugas/{id_petugas}','Petugas\Admin\PetugasController@editPetugasPost');
Route::delete('admin/delete/petugas{id_petugas}','Petugas\Admin\PetugasController@deletePetugasPost');
Route::post('admin/forgot/{id_petugas}','Petugas\Admin\PetugasController@forgotPetugasPost');
// Data SPP
Route::post('admin/spp','Petugas\Admin\SppController@tambahSppPost');
Route::patch('admin/spp/{id_spp}','Petugas\Admin\SppController@editSppPost');
Route::delete('admin/delete/spp{id_spp}','Petugas\Admin\SppController@deleteSppPost');
// Data Kelas
Route::post('admin/kelas','Petugas\Admin\KelasController@tambahKelasPost');
Route::patch('admin/kelas/{id_kelas}','Petugas\Admin\KelasController@editKelasPost');
Route::delete('admin/delete/kelas{id_kelas}','Petugas\Admin\KelasController@deleteKelasPost');
// Data Siswa
Route::post('admin/siswa','Petugas\Admin\SiswaController@tambahSiswaPost');
Route::patch('admin/siswa/{nisn}','Petugas\Admin\SiswaController@editSiswaPost');
Route::delete('admin/delete/siswa{nisn}','Petugas\Admin\SiswaController@deleteSiswaPost');
// Pembayaran
Route::post('admin/pembayaran','Petugas\Admin\PembayaranController@tambahPembayaranPost');
Route::patch('admin/pembayaran/{id_pembayaran}','Petugas\Admin\PembayaranController@editPembayaranPost');
Route::delete('admin/delete/pembayaran{id_pembayaran}','Petugas\Admin\PembayaranController@deletePembayaranPost');

// == Petugas ==
// Pembayaran
Route::post('petugas/pembayaran','Petugas\Petugas\PembayaranController@tambahPembayaranPost');
Route::patch('petugas/pembayaran/{id_pembayaran}','Petugas\Petugas\PembayaranController@editPembayaranPost');
Route::delete('petugas/pembayaran{id_pembayaran}','Petugas\Petugas\PembayaranController@deletePembayaranPost');

// Middleware Login
Route::group(['middleware' => 'users.auth'],function(){
    // Siswa
    Route::get('login/view/siswa','LoginController@viewLoginSiswa');
    // Petugas
    Route::get('login/view/petugas','LoginController@viewLoginPetugas');
});

// Middleware Siswa
Route::group(['middleware' => 'siswa'],function(){
    // Home
	Route::get('siswa/home','Siswa\HomeController@viewHomeSiswa'); 
});

// Middleware Admin
Route::group(['middleware' => 'admin'],function(){
    // Home
    Route::get('admin/home','Petugas\Admin\HomeController@viewHomeAdmin');
    // Data Petugas
    Route::get('admin/data-petugas','Petugas\Admin\PetugasController@viewdataPetugas');
    Route::get('admin/data-petugas/tambah','Petugas\Admin\PetugasController@viewTambahPetugas');
    Route::get('admin/data-petugas/edit/{id_petugas}','Petugas\Admin\PetugasController@viewEditPetugas');
    Route::get('admin/data-petugas/forgot/{id_petugas}','Petugas\Admin\PetugasController@viewForgotPetugas');
    // Data SPP
    Route::get('admin/data-spp','Petugas\Admin\SppController@viewdataSpp');
    Route::get('admin/data-spp/tambah','Petugas\Admin\SppController@viewTambahSpp');
    Route::get('admin/data-spp/edit/{id_spp}','Petugas\Admin\SppController@viewEditSpp');
    // Data Siswa
    Route::get('admin/data-siswa','Petugas\Admin\SiswaController@viewdataSiswa');
    Route::get('admin/data-siswa/tambah','Petugas\Admin\SiswaController@viewTambahSiswa'); 
    Route::get('admin/data-siswa/edit/{nisn}','Petugas\Admin\SiswaController@viewEditSiswa'); 
    // Data Kelas
    Route::get('admin/data-kelas','Petugas\Admin\KelasController@viewdataKelas');
    Route::get('admin/data-kelas/tambah','Petugas\Admin\KelasController@viewTambahKelas');
    Route::get('admin/data-kelas/edit/{id_kelas}','Petugas\Admin\KelasController@viewEditKelas');
    // Data Pembayaran
    Route::get('admin/data-pembayaran','Petugas\Admin\PembayaranController@viewdataPembayaran');
    Route::get('admin/data-pembayaran/tambah','Petugas\Admin\PembayaranController@viewTambahPembayaran');
    Route::get('admin/data-pembayaran/edit/{id_pembayaran}','Petugas\Admin\PembayaranController@viewEditPembayaran');
});

// Middleware Petugas
Route::group(['middleware' => 'petugas'],function(){
    // Home
    Route::get('petugas/home','Petugas\Petugas\HomeController@viewHomePetugas');
    // Pembayaran
    Route::get('petugas/data-pembayaran/tambah','Petugas\Petugas\PembayaranController@viewTambahPembayaran');
    Route::get('petugas/data-pembayaran/edit/{id_pembayaran}','Petugas\Petugas\PembayaranController@viewEditPembayaran');
});