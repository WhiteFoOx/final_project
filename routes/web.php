<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/users', 'MainController@getUsers');

Route::post('/submit', 'MainController@addTransaction');

Route::post('/add', 'MainController@addUser');
