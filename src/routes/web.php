<?php

use App\Http\Controllers\QiitaController;
use App\Http\Controllers\JsPracticeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\s3UpLoadController;
use App\Http\Controllers\accountController;



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

//Route::view('/', 'welcome');

Route::get('/qiita', 'QiitaController@index');

Route::get('/test', 'TestController@index');
Route::get('/jsPractice', 'JsPracticeController@index');
Route::post('/jsPractice', 'JsPracticeController@thanks');

// S3アップロード
Route::get('/s3UpLoad', 's3UpLoadController@display');
Route::post('/s3UpLoad', 's3UpLoadController@create');

// chart
Route::get('/chart', 'chartController@index');

// アカウント表示
Route::get('/displayAccount', 'accountController@index')->name('displayAccount');
Route::post('/storeAccount', 'accountController@store');
Route::post('/editAccount', 'accountController@edit');
Route::post('/deleteAccount', 'accountController@delete');

// spot_info
Route::get('/list', 'MainController@list');
Route::get('/detail', 'MainController@detail');
Route::match(['get', 'post'], '/search', 'MainController@search');
Route::post('/save', 'MainController@save');

