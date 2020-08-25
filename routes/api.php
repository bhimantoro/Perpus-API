<?php

use Illuminate\Support\Facades\Route;

Route::namespace('api')->group(function () {

    // Author
    Route::get('author', 'AuthorsController@index');
    Route::get('author/{id}', 'AuthorsController@show');
    Route::post('author', 'AuthorsController@store');
    Route::post('author/{id}', 'AuthorsController@update');
    Route::delete('author/{id}', 'AuthorsController@destroy');

    // Publisher
    Route::get('publisher', 'PublishersController@index');
    Route::get('publisher/{id}', 'PublishersController@show');
    Route::post('publisher', 'PublishersController@store');
    Route::post('publisher/{id}', 'PublishersController@update');
    Route::delete('publisher/{id}', 'PublishersController@destroy');

    // Shelf
    Route::get('shelf', 'ShelvesController@index');
    Route::get('shelf/{id}', 'ShelvesController@show');
    Route::post('shelf', 'ShelvesController@store');
    Route::post('shelf/{id}', 'ShelvesController@update');
    Route::delete('shelf/{id}', 'ShelvesController@destroy');
});
