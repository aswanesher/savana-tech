<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',array('as' => 'home','uses'=>'UserController@index'));
Route::get('login',array('uses'=>'UserController@login'));
Route::post('login',array('uses'=>'UserController@checkLogin'));
Route::get('logout',array('uses'=>'UserController@logout','before'=>'auth'));
//Route::group('');

//------------Halaman Dashboard
Route::get('dashboard',array('uses'=>'DashboardController@index','before'=>'auth'));
Route::get('dashboard/add',array('uses'=>'DashboardController@addPage','before'=>'auth'));
Route::get('dashboard/addmerk',array('uses'=>'DashboardController@addMerk','before'=>'auth'));
Route::post('dashboard/add',array('uses'=>'DashboardController@saveData','before'=>'auth'));
Route::post('dashboard/addmerk',array('uses'=>'DashboardController@saveDataMerk','before'=>'auth'));
Route::get('dashboard/detail/{id_sp}',array('uses'=>'DashboardController@detailPage','before'=>'auth'));
Route::get('dashboard/edit/{id_sp}',array('uses'=>'DashboardController@editPage','before'=>'auth'));
Route::post('dashboard/edit',array('uses'=>'DashboardController@editData','before'=>'auth'));
Route::get('dashboard/delete/{id_sp}',array('uses'=>'DashboardController@deleteData','before'=>'auth'));
Route::post('dashboard/search',array('uses'=>'DashboardController@searchPage','before'=>'auth'));
Route::get('dashboard/merk',array('uses'=>'DashboardController@getMerk','before'=>'auth'));
