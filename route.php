<?php

use Framework\Route;

Route::action('GET', '/welcome', function(){
    echo "welcome";
});


Route::action('GET', '/hello', 'SampleController@hello');
Route::get('/db', 'SampleController@db');
Route::get('/log', 'SampleController@log');
Route::get('/blade', 'SampleController@blade');
Route::get('/redis', 'SampleController@redis');

