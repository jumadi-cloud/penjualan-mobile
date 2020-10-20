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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// ==================================================Admin Panel=================================
Route::group(['middleware' => ['auth']], function () {
Route::get('/pmp-admin','Admin\AdminBerandaController@index');

// ==================================================Slider
Route::get('slider-home','Admin\SliderHomeAdminController@index');
Route::get('tambah-slider-home','Admin\SliderHomeAdminController@create');
Route::post('tambah-slider-home','Admin\SliderHomeAdminController@store');
Route::get('edit-slider-home/{id}','Admin\SliderHomeAdminController@edit');
Route::post('edit-slider-home/{id}','Admin\SliderHomeAdminController@update');
Route::get('hapus-slider-home/{id}','Admin\SliderHomeAdminController@destroy');

// ==================================================Mobil
Route::get('data-mobil','Admin\MobilAdminController@index');
Route::get('tambah-mobil','Admin\MobilAdminController@create');
Route::post('tambah-mobil','Admin\MobilAdminController@store');
Route::get('detail-mobil/{id}','Admin\MobilAdminController@show');
Route::get('edit-mobil/{id}','Admin\MobilAdminController@edit');
Route::post('edit-mobil/{id}','Admin\MobilAdminController@update');
Route::get('tambah-galeri-mobil/{id}','Admin\MobilAdminController@createGaleri');
Route::post('tambah-galeri-mobil/{id}','Admin\MobilAdminController@storeGaleri');
Route::get('hapus-mobil/{id}','Admin\MobilAdminController@destroy');
// // ==================================================Warna
// Route::get('data-warna','Admin\WarnaController@index');
// // ==================================================Bahan Bakar
// Route::get('data-bahan-bakar','Admin\BahanBakarController@index');
// // ==================================================Model
// Route::get('data-model','Admin\ModelAdminController@index');

// ==================================================pdf
Route::get('data-pdf','Admin\PdfAdminController@index');
Route::get('tambah-pdf','Admin\PdfAdminController@create');
Route::post('tambah-pdf','Admin\PdfAdminController@store');
Route::get('edit-pdf/{id}','Admin\PdfAdminController@edit');
Route::post('edit-pdf/{id}','Admin\PdfAdminController@update');
Route::get('hapus-pdf/{id}','Admin\PdfAdminController@destroy');

// ==================================================Merek
Route::get('data-merek','Admin\MerekAdminController@index');
Route::get('tambah-merek','Admin\MerekAdminController@create');
Route::post('tambah-merek','Admin\MerekAdminController@store');
Route::get('edit-merek/{id}','Admin\MerekAdminController@edit');
Route::post('edit-merek/{id}','Admin\MerekAdminController@update');
Route::get('hapus-merek/{id}','Admin\MerekAdminController@destroy');

// ==================================================Tahun
Route::get('data-tahun','Admin\TahunAdminController@index');
Route::get('tambah-tahun','Admin\TahunAdminController@create');
Route::post('tambah-tahun','Admin\TahunAdminController@store');
Route::get('edit-tahun/{id}','Admin\TahunAdminController@edit');
Route::post('edit-tahun/{id}','Admin\TahunAdminController@update');
Route::get('hapus-tahun/{id}','Admin\TahunAdminController@destroy');

// ==================================================Lokasi
Route::get('data-lokasi','Admin\LokasiAdminController@index');
Route::get('tambah-lokasi','Admin\LokasiAdminController@create');
Route::post('tambah-lokasi','Admin\LokasiAdminController@store');
Route::get('edit-lokasi/{id}','Admin\LokasiAdminController@edit');
Route::post('edit-lokasi/{id}','Admin\LokasiAdminController@update');
Route::get('hapus-lokasi/{id}','Admin\LokasiAdminController@destroy');

// ==================================================Model
Route::get('data-model','Admin\ModelAdminController@index');
Route::get('tambah-model','Admin\ModelAdminController@create');
Route::post('tambah-model','Admin\ModelAdminController@store');
Route::get('edit-model/{id}','Admin\ModelAdminController@edit');
Route::post('edit-model/{id}','Admin\ModelAdminController@update');
Route::get('hapus-model/{id}','Admin\ModelAdminController@destroy');

// ==================================================warnan
Route::get('data-warna','Admin\WarnaAdminController@index');
Route::get('tambah-warna','Admin\WarnaAdminController@create');
Route::post('tambah-warna','Admin\WarnaAdminController@store');
Route::get('edit-warna/{id}','Admin\WarnaAdminController@edit');
Route::post('edit-warna/{id}','Admin\WarnaAdminController@update');
Route::get('hapus-warna/{id}','Admin\WarnaAdminController@destroy');

});

// Route::get('/pmp-admin','admin\DashboardController@index');
// Route::get('pmp-admin/data-mobil','admin\DataMobilController@index');
// Route::get('pmp-admin/tambah-data-mobil','admin\DataMobilController@create');

// ==================================================End Admin Panel=================================




// ==================================================Frontend=================================
Route::group(['middleware' => ['setting']], function () {
Route::get('/','HomeFrontController@index');


Route::get('listings','HomeFrontController@indexFilter');
Route::get('listings/{merek}','ListFrontController@indexMerek');


Route::get('searchFilter','HomeFrontController@indexFilter');
Route::get('searchlistFilter','ListFrontController@indexFilter');

Route::get('car-details/{id}/{merek}','DetailsFrontController@index');
Route::get('/home', 'Admin\AdminBerandaController@index');
Route::get('/convert-image', 'Admin\MobilAdminController@convert');
Route::get('/convert-image2', 'Admin\MobilAdminController@convert2');
});

// ==================================================End Frontend=================================


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
