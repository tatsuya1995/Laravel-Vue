<?php

use App\Http\Controllers\QiitaController;
use App\Http\Controllers\JsPracticeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\s3UpLoadController;



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

