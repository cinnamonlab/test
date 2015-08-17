<?php

use Framework\Route;

Route::action('GET', '/welcome', function(){
    return "welcome";
})->then(function(){
    echo "*";
});
Route::get('/serverinfo', function(){ return (print_r($_SERVER,true));});
Route::action('GET', '/hello', 'SampleController@hello');
Route::get('/db', 'SampleController@db');
Route::get('/log', 'SampleController@log');
Route::get('/blade', 'SampleController@blade');
Route::get('/redis', 'SampleController@redis');
Route::otherwise( function(){ echo "not found"; });
