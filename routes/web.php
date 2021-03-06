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

	Route::get('login','Admin\AuthController@login');
	Route::post('login','Admin\AuthController@login_action');
	Route::get('logout','Admin\AuthController@logout');

Route::group(['middleware' => 'cek_admin'], function () {

	Route::get('dashboard','Admin\DashboardController@index');

	Route::get('guru_terbaik','Admin\GuruTerbaikController@index');

	Route::get('link_guru_meet','Admin\LinkGuruMeetController@index');

	Route::get('aktivitas','Admin\AktivitasController@index')->name('aktivitas.index');

	Route::get('manajemen_user','Admin\ManajemenUserController@index');
	Route::delete('manajemen_user/delete','Admin\ManajemenUserController@destroy');
	Route::get('manajemen_user/{id}/edit','Admin\ManajemenUserController@edit');
	Route::put('manajemen_user/update','Admin\ManajemenUserController@update');
	Route::post('manajemen_user','Admin\ManajemenUserController@store');

	Route::get('transaksi','Admin\TransaksiController@index')->name('transaksi.index');
	Route::post('transaksi/change_status/{status}','Admin\TransaksiController@change_status');
	Route::get('transaksi/{id}','Admin\TransaksiController@detail');
	Route::put('transaksi/update_link_meeting','Admin\TransaksiController@update_link_meeting');
	Route::get('transaksi/{id}/show','Admin\TransaksiController@show');

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
		
		Route::get('evaluasi_belajar','Admin\EvaluasiBelajarController@index');

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

	Route::get('pencairan','Admin\PencairanController@index')->name('admin.pencairan.index');
	Route::put('pencairan/approve','Admin\PencairanController@approve')->name('admin.pencairan.approve');
	Route::put('pencairan/reject','Admin\PencairanController@reject')->name('admin.pencairan.reject');

});

});

Route::prefix('siswa')->group(function () {
	
	Route::get('login','Siswa\AuthController@login');
	Route::get('verify','Siswa\AuthController@verify');
	Route::post('login','Siswa\AuthController@login_action');
	Route::get('register','Siswa\AuthController@register');
	Route::post('register','Siswa\AuthController@register_action');

Route::group(['middleware' => 'cek_siswa'], function () {

	Route::get('logout','Siswa\AuthController@logout');

	Route::get('dashboard','Siswa\DashboardController@index');
	Route::get('profile','Siswa\ProfilController@index')->name('siswa.profile');
	Route::put('update_profile','Siswa\ProfilController@update_profile')->name('siswa.update_profile');

	Route::get('cariguru', 'Siswa\CariguruController@index');
	Route::get('cariguru/filter/{jenjang}/{kurikulum}', 'Siswa\CariguruController@filter_mapel');
	Route::get('cariguru/action_filter/{jenjang}/{kurikulum}/{mapel}', 'Siswa\CariguruController@action_filter');
	Route::get('cariguru/profil_tentor/{id}', 'Siswa\CariguruController@profil_tentor');
	Route::post('cariguru/checkout', 'Siswa\CariguruController@checkout');
	Route::post('cariguru/cek_harga', 'Siswa\CariguruController@cek_harga');
	Route::get('cariguru/checkout/promo/{promo}','Siswa\CariguruController@promo');
	Route::post('cariguru/lanjutkan_pembayaran', 'Siswa\CariguruController@pembayaran');

	Route::get('transaksi', 'Siswa\TransaksiController@index');
	Route::get('pembayaran/{id}','Siswa\TransaksiController@pembayaran')->name('siswa.pembayaran');
	Route::get('pembayaran/detail/{id}','Siswa\TransaksiController@detail_pembayaran')->name('siswa.pembayaran.detail');

	Route::get('schedule','Siswa\ScheduleController@index');

	Route::get('penilaian','Siswa\PenilaianController@index')->name('penilaian.index');
	Route::get('penilaian/{id}','Siswa\PenilaianController@detail')->name('penilaian.detail');
	Route::post('penilaian','Siswa\PenilaianController@store')->name('penilaian.store');

});

});

Route::prefix('tentor')->group(function () {

	Route::get('login','Tentor\AuthController@login');
	Route::post('login','Tentor\AuthController@login_action');\

Route::group(['middleware' => 'cek_tentor'], function () {

	Route::get('logout','Tentor\AuthController@logout');
	Route::get('ubah_password','Tentor\AuthController@ubah_password');
	Route::put('ubah_password_action','Tentor\AuthController@ubah_password_action');

	Route::resource('blog', 'Tentor\BlogController');

	Route::get('dashboard','Tentor\DashboardController@index');

	Route::get('permintaan_les','Tentor\PermintaanLesController@index');
	Route::get('permintaan_les/{id}','Tentor\PermintaanLesController@detail');
	Route::put('permintaan_les/ambil','Tentor\PermintaanLesController@ambil');

	Route::get('profil','Tentor\ProfilController@index');
	Route::put('profil','Tentor\ProfilController@update');
	Route::get('kota/{id}','Tentor\ProfilController@kota');
	Route::get('kecamatan/{id}','Tentor\ProfilController@kecamatan');
	Route::get('kelurahan/{id}','Tentor\ProfilController@kelurahan');

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

	Route::get('schedule','Tentor\ScheduleController@index');
	Route::put('schedule','Tentor\ScheduleController@update')->name('tentor.schedule.update');

	Route::get('evaluasi','Tentor\EvaluasiController@index');
	Route::get('evaluasi/murid/{id}','Tentor\EvaluasiController@detail_murid');
	Route::post('evaluasi','Tentor\EvaluasiController@store')->name('evaluasi.store');

	Route::get('pencairan','Tentor\PencairanController@index')->name('tentor.pencairan.index');
	Route::post('pencairan','Tentor\PencairanController@store')->name('tentor.pencairan.store');

	Route::get('bank','Tentor\BankController@index')->name('tentor.bank.index');
	Route::post('bank','Tentor\BankController@store')->name('tentor.bank.store');
	Route::get('bank/detail/{id}','Tentor\BankController@detail');
	Route::put('bank/update','Tentor\BankController@update')->name('tentor.bank.update');
	Route::delete('bank/delete','Tentor\BankController@delete')->name('tentor.bank.delete');

	Route::prefix('blog')->group(function() {
		Route::delete('delete','Tentor\BlogController@destroy');
	});

});

});

Route::resource('/','Dashboard\DashboardController');
Route::get('/blog/{id}','Dashboard\BlogController@detail')->name('blog.detail.front');
