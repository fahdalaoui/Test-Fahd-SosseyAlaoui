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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/dashboard/{name}','AdminController@delete');
Route::get('/admin/add','AdminController@insert');
Route::post('/admin/insert','AdminController@add');

Route::get('/tech/dashboard','TechController@dashboard');

Route::get('/gest/dashboard','GestController@dashboard');
Route::get('/gest/add','GestController@insert');
Route::post('/gest/insert','GestController@add');
Route::get('/gest/dashboard/{name}','GestController@delete');