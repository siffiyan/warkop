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

Route::prefix('admin')->group(function () {

	Route::get('dashboard','Admin\DashboardController@index');

	Route::get('manajemen_user','Admin\ManajemenUserController@index');
	Route::delete('manajemen_user/delete','Admin\ManajemenUserController@destroy');
	Route::get('manajemen_user/{id}/edit','Admin\ManajemenUserController@edit');
	Route::put('manajemen_user/update','Admin\ManajemenUserController@update');
	Route::post('manajemen_user','Admin\ManajemenUserController@store');

	Route::get('transaksi','Admin\TransaksiController@index')->name('transaksi.index');
	Route::post('transaksi/change_status/{status}','Admin\TransaksiController@change_status');

	Route::prefix('setting')->group(function () {

		Route::get('share_profit','Admin\ShareProfitController@index');
		Route::put('share_profit/{id}','Admin\ShareProfitController@update');

		Route::get('atur_diskon','Admin\AturDiskonController@index');
		Route::post('atur_diskon','Admin\AturDiskonController@store');
		Route::get('atur_diskon/{id}/edit','Admin\AturDiskonController@edit');
		Route::put('atur_diskon/update','Admin\AturDiskonController@update');
		Route::delete('atur_diskon/delete','Admin\AturDiskonController@destroy');

		Route::get('biaya_les','Admin\BiayaLesController@index');
		Route::post('biaya_les','Admin\BiayaLesController@store');
		Route::get('biaya_les/{id}/edit','Admin\BiayaLesController@edit');
		Route::put('biaya_les/update','Admin\BiayaLesController@update');
		Route::delete('biaya_les','Admin\BiayaLesController@destroy');
	});

	Route::prefix('pembelajaran')->group(function () {
		
		Route::get('jenjang','Admin\JenjangController@index');
		Route::delete('jenjang','Admin\JenjangController@destroy');
		Route::post('jenjang','Admin\JenjangController@store');
		Route::get('jenjang/edit/{id}','Admin\JenjangController@edit');
		Route::put('jenjang/update','Admin\JenjangController@update');

		Route::get('kurikulum','Admin\kurikulumController@index');
		Route::delete('kurikulum','Admin\kurikulumController@destroy');
		Route::post('kurikulum','Admin\kurikulumController@store');
		Route::get('kurikulum/edit/{id}','Admin\KurikulumController@edit');
		Route::put('kurikulum/update','Admin\kurikulumController@update');

		Route::get('mapel','Admin\mapelController@index');
		Route::delete('mapel','Admin\mapelController@destroy');
		Route::post('mapel','Admin\mapelController@store');
		Route::get('mapel/edit/{id}','Admin\mapelController@edit');
		Route::put('mapel/update','Admin\mapelController@update');

		Route::get('mapel/list_jenjang','Admin\mapelController@list_jenjang');
		Route::get('mapel/list_kurikulum','Admin\mapelController@list_kurikulum');
	});

	Route::prefix('blog')->group(function () {
		Route::resource('blogAdmin', 'Admin\BlogController');
		Route::get('dashboard', 'Admin\BlogController@index');
		Route::delete('blog','Admin\BlogController@destroy');
		Route::patch('inactive', 'Admin\BlogController@inactive');
		Route::patch('active', 'Admin\BlogController@active');
		Route::put('approve/{id}', 'Admin\BlogController@approve');
		Route::put('reject/{id}', 'Admin\BlogController@reject');
	});

});

Route::prefix('siswa')->group(function () {
	
	Route::get('login','Siswa\AuthController@login');
	Route::post('login','Siswa\AuthController@login_action');
	Route::get('logout','Siswa\AuthController@logout');
	Route::get('register','Siswa\AuthController@register');
	Route::post('register','Siswa\AuthController@register_action');

	Route::get('dashboard','Siswa\DashboardController@index');
	Route::get('profile','Siswa\DashboardController@profile')->name('siswa.profile');
	Route::put('update_profile','Siswa\DashboardController@update_profile')->name('siswa.update_profile');

	Route::get('cariguru', 'Siswa\CariguruController@index');
	Route::get('cariguru/filter/{jenjang}/{kurikulum}', 'Siswa\CariguruController@filter_mapel');
	Route::get('cariguru/action_filter/{jenjang}/{kurikulum}/{mapel}', 'Siswa\CariguruController@action_filter');
	Route::get('cariguru/profil_tentor/{id}', 'Siswa\CariguruController@profil_tentor');
	Route::post('cariguru/checkout', 'Siswa\CariguruController@checkout');
	Route::post('cariguru/cek_harga', 'Siswa\CariguruController@cek_harga');
	Route::get('cariguru/checkout/promo/{promo}','Siswa\CariguruController@promo');
	Route::post('cariguru/lanjutkan_pembayaran', 'Siswa\CariguruController@pembayaran');

	Route::get('transaksi', 'Siswa\TransaksiController@index');
	Route::get('pembayaran','Siswa\TransaksiController@pembayaran')->name('siswa.pembayaran');
	Route::get('pembayaran/detail/{id}','Siswa\TransaksiController@detail_pembayaran')->name('siswa.pembayaran.detail');

});

Route::prefix('tentor')->group(function () {

	Route::resource('blog', 'Tentor\BlogController');

	Route::get('login','Tentor\AuthController@login');
	Route::post('login','Tentor\AuthController@login_action');
	Route::get('logout','Tentor\AuthController@logout');
	Route::get('ubah_password','Tentor\AuthController@ubah_password');
	Route::put('ubah_password_action','Tentor\AuthController@ubah_password_action');

	Route::get('dashboard','Tentor\DashboardController@index');

	Route::get('permintaan_les','Tentor\PermintaanLesController@index');

	Route::get('profil','Tentor\ProfilController@index');
	Route::put('profil','Tentor\ProfilController@update');

	Route::post('pengalaman_mengajar_mitra','Tentor\PengalamanMengajarMitraController@store');
	Route::get('pengalaman_mengajar_mitra/{id}/edit','Tentor\PengalamanMengajarMitraController@edit');
	Route::put('pengalaman_mengajar_mitra','Tentor\PengalamanMengajarMitraController@update');
	Route::delete('pengalaman_mengajar_mitra','Tentor\PengalamanMengajarMitraController@destroy');

	Route::post('prestasi_mitra','Tentor\PrestasiMitraController@store');
	Route::get('prestasi_mitra/{id}/edit','Tentor\PrestasiMitraController@edit');
	Route::put('prestasi_mitra','Tentor\PrestasiMitraController@update');
	Route::delete('prestasi_mitra','Tentor\PrestasiMitraController@destroy');

	Route::post('pilihan_mengajar_mitra','Tentor\PilihanMengajarMitraController@store');
	Route::get('pilihan_mengajar_mitra/{id}/edit','Tentor\PilihanMengajarMitraController@edit');
	Route::put('pilihan_mengajar_mitra','Tentor\PilihanMengajarMitraController@update');
	Route::delete('pilihan_mengajar_mitra','Tentor\PilihanMengajarMitraController@destroy');

	Route::prefix('blog')->group(function() {
		Route::delete('delete','Tentor\BlogController@destroy');
	});

});

Route::resource('/','Dashboard\DashboardController');
Route::view('/blog','landing_page.blog');
