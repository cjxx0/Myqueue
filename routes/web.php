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

Route::get('form', 'AjaxDemoController@form');
//select box dependent list 
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'AjaxDemoController@selectAjax']);
//see queueline
Route::get('/queueline', 'AjaxDemoController@getQueueline');
//insert data into database after submit
Route::post('/form/submit', 'AjaxDemoController@submit');
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get ('/form',['uses'=>'AjaxDemoController@form'])->name('addQueue');
//Display welcome page before joining queue
Route::get ('/readthis',['uses'=>'AjaxDemoController@readthis'])->name('addQueue');
