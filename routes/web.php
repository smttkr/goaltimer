<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\TimeRecordController;
use App\Http\Middleware\GoalMiddleware;
use App\Http\Middleware\BlockImpostor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('toppage');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/GoalController', 'GoalController@index')->name('index');
    Route::post('/GoalController/create', 'GoalController@create')->name('create');

    Route::group(['middleware' => 'BlockImpostor'], function () {
        Route::get('/GoalController/show/{goal}', 'GoalController@show')->name('admin');
        Route::put('/GoalController/update/{point}/{goal}', 'GoalController@update');
        Route::delete('/GoalController/delete/{goal}', 'GoalController@delete')->name('delete');

        Route::post('/TimeRecordController/create/{goal}', 'TimeRecordController@create');
        Route::get('/TimeRecordController/show/{goal}', 'TimeRecordController@show');
        Route::put('/TimeRecordController/update/{point}/{timeRecord}', 'TimeRecordController@update');
        Route::delete('/TimeRecordController/delete/{timeRecord}', 'TimeRecordController@delete');
    });
});
