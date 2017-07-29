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

Route::get('/', 'landingController@index');

Route::get('card/{print}/{number}','cardController@index')->name('viewCard');
Route::get('debug', 'cardController@datacard')->name('debug');
Route::get('installation', 'cardController@install')->name('installJSON');
Route::get('insert', 'cardController@insert')->name('insertJSON');