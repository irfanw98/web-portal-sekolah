<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


//TESTING KIRIM EMAIL 
// Route::get('kirimemail', function () {
//     Mail::raw('Hallo Siswa Baru', function ($message) {
//         $message->to('wahyudiirfan795@gmail.com', 'Irfan');
//         $message->subject('Pendaftaran Siswa');
//     });
// });


Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');
Route::get('/about', 'SiteController@about');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/edit/{siswa}', 'SiswaController@edit');
    Route::post('/siswa/update/{siswa}', 'SiswaController@update');
    Route::get('/siswa/delete/{siswa}', 'SiswaController@delete');
    Route::get('/siswa/profile/{siswa}', 'SiswaController@profile');
    Route::post('/siswa/addnilai/{id}', 'SiswaController@addnilai');
    Route::get('/siswa/deletenilai/{id}/{idmapel}', 'SiswaController@deletenilai');
    Route::get('/siswa/exportExcel', 'SiswaController@exportExcel');
    Route::get('/siswa/exportPDF', 'SiswaController@exportPDF');
    Route::post('/siswa/import', 'SiswaController@importExcel')->name('siswa.import');
    Route::get('/guru/profile/{id}', 'GuruController@profile');
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::get('post/add', [
        'uses' => 'PostController@add',
        'as' => 'posts.add'
    ]);
    Route::post('post/create', [
        'uses' => 'PostController@create',
        'as' => 'posts.create'
    ]);
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,siswa']], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/forum', 'ForumController@index');
    Route::post('forum/create', 'ForumController@create');
});

Route::group(['middleware' => ['auth', 'CheckRole:siswa']], function () {
    Route::get('/myprofile', 'SiswaController@myprofile');
});


Route::get('getdatasiswa', [
    'uses' => 'SiswaController@getdatasiswa',
    'as' => 'ajax.get.data.siswa'
]);

Route::get('/{slug}', [
    'uses' => 'SiteController@singlepost',
    'as' => 'site.single.post'
]);
