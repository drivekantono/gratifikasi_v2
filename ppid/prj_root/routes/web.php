<?php

//Route::get('/{any}', 'DashboardController@dashboard')->where('any', '.*');

Route::get('/', 'DashboardController@dashboard')->name('landing_page');

//profil
Route::get('/profil','ppid\ProfilController@index')->name('ppid.profil.index');

//alur
Route::get('/alur','ppid\AlurController@index')->name('ppid.alur.index');

//layanan
Route::get('/layanan/daftar_informasi', 'ppid\LayananController@daftar_informasi')->name('ppid.layanan.daftar_informasi');
Route::get('/layanan/permohonan_informasi', 'ppid\LayananController@permohonan_informasi')->name('ppid.layanan.permohonan_informasi');
Route::get('/layanan/permohonan_keberatan', 'ppid\LayananController@permohonan_keberatan')->name('ppid.layanan.permohonan_keberatan');
Route::get('/layanan/laporan_akses_informasi_publik', 'ppid\LayananController@laporan_akses_informasi_publik')->name('ppid.layanan.laporan_akses_informasi_publik');

//regulasi
Route::get('/regulasi', 'ppid\RegulasiController@index')->name('ppid.regulasi');


//====================================================================================================================

Auth::routes();

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
	//
});

Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function() {
	//Akun
	Route::get('home', 'HomeController@index')->name('user.home');
	Route::get('dashboard', 'ppid\UserController@dashboard')->name('user.dashboard');
	Route::get('informasi_akun', 'ppid\UserController@informasi_akun')->name('user.informasi_akun');
	Route::get('informasi_akun/ubah', 'ppid\UserController@informasi_akun_ubah')->name('user.informasi_akun.ubah');
    
	//layanan
	Route::post('/layanan/permohonan_informasi/buat', 'ppid\LayananController@buat_pi')->name('ppid.layanan.permohonan_informasi.buat');
	Route::get('/layanan/permohonan_informasi/{id}/lihat', 'ppid\LayananController@lihat_pi')->name('ppid.layanan.permohonan_informasi.lihat');
	Route::get('/layanan/permohonan_informasi/{id}/detail', 'ppid\LayananController@detail_pi')->name('ppid.layanan.permohonan_informasi.detail');
	Route::get('/layanan/permohonan_informasi/{id}/cetak', 'ppid\LayananController@cetak_pi')->name('ppid.layanan.permohonan_informasi.cetak');
});

Route::group(['middleware' => 'role:super', 'prefix' => 'super'], function() {
    //
});
