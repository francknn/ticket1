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
Auth::routes();
Route::get('create-chart/{type}','ChartController@makeChart');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('bar-chart', 'ChartController@index');

Route::group([
    'middleware' => 'CORS',
], function () {
Route::get('/rolespermissions', 'RoleController@addrolepermission')->name('rolespermissions');
});