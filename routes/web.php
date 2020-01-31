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

Route::get('/', 'MultipleUploadController@index');
Route::post('multiple-file-upload/upload', 'MultipleUploadController@upload')->name('upload');
Route::get('view', 'MultipleUploadController@view')->name('view');
Route::get('delete/{id}', 'MultipleUploadController@delete')->name('');
Route::post('update', 'MultipleUploadController@update')->name('');
Route::get('edit/{id}', 'MultipleUploadController@edit')->name('');
