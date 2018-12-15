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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/login', function () {
    return view('layouts.admin');
});

Route::get('settings/profile', 'SettingsController@profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('karyawan','KaryawanController');
Route::resource('tentang','TentangController');
Route::resource('artikel','ArtikelController');
Route::resource('testimoni','TestimoniController');
Route::resource('kategori', 'KategoriController');
Route::resource('barang', 'BarangController');
Route::resource('kontak','KontakController');

Route::group(
    ['prefix'=>'admin', 'as' => 'admin.', 'middleware'=>['auth','role:admin|member']],
function () {
    Route::get('/', 'AdminController@index');
    Route::resource('karyawan','KaryawanController');
    Route::resource('tentang','TentangController');
    Route::resource('artikel','ArtikelController');
    Route::resource('testimoni','TestimoniController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('barang', 'BarangController');
    Route::resource('kontak','KontakController');
    Route::post('barang/{publish}', 'BarangController@Publish')->name('barang.publish');
}
);

Route::get('/index', function () {
    return view('frontend.index');
});

Route::get('/gallery', function () {
    return view('frontend.gallery');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/blog', function () {
    return view('frontend.blog');
});


Route::get('/kontak', function () {
    return view('frontend.kontak');
});

// frontend
Route::get('/barang_kategori/{id}', 'BarangController@filters_barang');
Route::get('/artikel/single/{artikel}', 'FrontendController@single')->name('single');
Route::get('/barang/detail/{barang}', 'FrontendController@detail')->name('detail');
Route::get('barang/kategori/{kategori}', 'FrontendController@barangkategori');
