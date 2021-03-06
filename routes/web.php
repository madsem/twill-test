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

Route::get('/', 'DesignpageController@index');



Route::get('/project/{projectSlug}', 'ProjectController@show');

Route::get('/info', 'InfopageController@index');

Route::get('/index', 'ProjectController@index');

Route::get('/experiments', 'ExperimentController@index');

Route::get('/tagged/{tagSlug}', 'ProjecttagController@show');