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
Route::get('/tech/operation/{id}','TechController@insert');
Route::get('/tech/alloperations','TechController@allOperations');
Route::post('/tech/insert/{id}','TechController@add');
Route::get('/tech/update/{id}','TechController@update');
Route::post('/tech/modifier/{id}','TechController@modifier');

Route::get('/gest/dashboard','GestController@dashboard');
Route::get('/gest/add','GestController@insert');
Route::post('/gest/insert','GestController@add');
Route::get('/gest/dashboard/{immatriculation}','GestController@delete');