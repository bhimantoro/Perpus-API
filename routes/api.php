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

    // Category
    Route::get('category', 'CategoriesController@index');
    Route::get('category/{id}', 'CategoriesController@show');
    Route::post('category', 'CategoriesController@store');
    Route::post('category/{id}', 'CategoriesController@update');
    Route::delete('category/{id}', 'CategoriesController@destroy');

    // Book
    Route::get('book', 'BooksController@index');
    Route::get('book/{id}', 'BooksController@show');
    Route::post('book', 'BooksController@store');
    Route::post('book/{id}', 'BooksController@update');
    Route::delete('book/{id}', 'BooksController@destroy');

    // Book Registration
    Route::get('book/registration', 'BooksRegistrationController@index');
    Route::get('book/registration/{id}', 'BooksRegistrationController@show');
    Route::post('book/registration', 'BooksRegistrationController@store');
    Route::post('book/registration/{id}', 'BooksRegistrationController@update');
    Route::delete('book/registration/{id}', 'BooksRegistrationController@destroy');
});
