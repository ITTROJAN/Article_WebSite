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

Route::get('/','articlecontroller@welcome');
Route::get('/addarticle', function () {
    return view('addarticle');
});
Route::get('/sign', function () {
    return view('sign');
});

Route::get('/try', function () {
    return view('try');
});



Route::get('/adduser.php', 'usercontroller@signup');
Route::get('/signin.php', 'usercontroller@signin');
Route::post('/addarticle', 'articlecontroller@test');
Route::get('/art/edit/{id}','articlecontroller@viewedit');
Route::get('/issignin.php', 'usercontroller@test');
Auth::routes();
Route::post('/editarticle/{id}','articlecontroller@edit');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search','articlecontroller@search');
Route::get('/art/view/{id}','articlecontroller@view1');
Route::get('/art/delete/{id}','articlecontroller@deletee');
Route::get('/art/publish/{id}','articlecontroller@publish');
Route::get('/settings/{id}','usercontroller@setting');
Route::get('/settings/{id}/password',function () {
    return view('reset');
});
