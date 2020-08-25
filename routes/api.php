<?php

use Illuminate\Support\Facades\Route;

Route::namespace('api')->group(function () {
    Route::get('author', 'AuthorsController@index');
    Route::get('author/{id}', 'AuthorsController@show');
    Route::post('author', 'AuthorsController@store');
    Route::post('author/{id}', 'AuthorsController@update');
    Route::delete('author/{id}', 'AuthorsController@destroy');
});
