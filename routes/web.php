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
    return view('ecommerce.landingpage');
});

Route::prefix('customer')->group(function () {
	// login dan regis
    Route::get('/daftar','Customer\AkunController@daftar')->name('customer.daftar');
	Route::post('/registrasi','Customer\AkunController@store')->name('customer.registrasi');
	Route::get('/login','Customer\AkunController@index')->name('customer.login');
	Route::post('/aksi_login','Customer\AkunController@authenticate')->name('customer.aksi_login');
	Route::group(['middleware'=>'auth'], function () {
	Route::get('/index','Customer\EcommerceController@index')->name('customer.index');
	Route::get('/product','Customer\EcommerceController@product')->name('customer.product');

	// transaksi
	Route::get('/product/{id}','Customer\EcommerceController@show')->name('customer.detail_product');

	Route::post('cart','Customer\KeranjangController@addToCart')->name('customer.addCart');
	Route::get('/cart','Customer\KeranjangController@listCart')->name('customer.listCart');
	Route::post('/cart/update','Customer\KeranjangController@updateCart')->name('customer.updateCart');
	Route::get('checkout','Customer\KeranjangController@checkout')->name('customer.checkout');
	Route::post('/checkout','Customer\KeranjangController@prosesCheckout')->name('customer.prosesCheckout');
	Route::get('/checkout/{id}','Customer\KeranjangController@checkoutFinish')->name('customer.nota');
	Route::get('/riwayat','Customer\HistoryController@show')->name('customer.riwayat');
	Route::get('/pagepembayaran','Customer\PembayaranController@index')->name('customer.pembayaran');
	Route::post('/pembayaran','Customer\PembayaranController@store')->name('customer.bayar');
	Route::get('/logout','Customer\AkunController@logout')->name('customer.logout'); });

});



// Route::get('/admin',function(){
// 	return view('products.index');
// });

Route::prefix('admin')->group(function () {
	Route::get('/', 'Admin\AutentikasiController@index')->name('admin.login');
	Route::post('/login','Admin\AutentikasiController@authenticate')->name('admin.aksi_login');
	Route::get('/daftar','Admin\AutentikasiController@daftar')->name('admin.daftar');
	Route::post('/registrasi','Admin\AutentikasiController@store')->name('admin.registrasi');
	Route::get('/home','Admin\HomeController@index')->name('admin.home');
	Route::resource('kategori','Admin\KategoriController')->except(['create','show']);
	Route::resource('product','Admin\ProductController');
	Route::get('pelanggan','Admin\PelangganController@index')->name('admin.cust');
	Route::get('penjualan','Admin\PembelianController@index')->name('admin.penjualan');
});


