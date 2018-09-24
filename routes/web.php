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
    return view('home');
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/users', 'MainController@getUsers');

Route::post('/submit', 'MainController@submit');

Route::post('/add', 'MainController@addUser');
