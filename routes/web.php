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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/progress', 'ReportController@progress');

Route::get('/new/project', 'CategoryController@IndexProject');

Route::get('/new/data', 'DataController@index');

Route::post('/add_data', 'DataController@store');

Route::get('/detaildata/{id}', 'DataController@shows');

Route::put('/updatedata/{id}', 'DataController@update');

Route::delete('/deletedata/{id}', 'DataController@destroy');

Route::post('/add_project', 'CategoryController@store_project');

Route::post('/add_sub_project', 'CategoryController@store_category');

Route::get('/listcategory', 'ReportController@show');

Route::post('/add_progress', 'ReportController@store_report');

Route::get('/listreport', 'HomeController@shows');

Route::get('/listreport1', 'HomeController@shows');