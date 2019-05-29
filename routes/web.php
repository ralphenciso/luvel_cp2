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

Route::resource('vehicles', 'VehiclesController');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/leaserequests', 'LeaseRequestsController@store');
Route::get('/leaserequests', 'LeaseRequestsController@index');
Route::delete('/leaserequests/{leaserequest}', 'LeaseRequestsController@destroy');
Route::patch('/leaserequests/{leaserequest}', 'LeaseRequestsController@update');



Route::patch('/leaserequests/{leaserequest}/approve', 'LeaseRequestsController@approve');
