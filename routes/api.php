<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::get('books', 'BookController@index')->name('books');
Route::group(['prefix' => 'book'], function () {
    Route::post('add', 'BookController@add')->name('book.add');
    Route::put('update/{id}', 'BookController@update')->name('book.update');
    Route::delete('delete/{id}', 'BookController@delete')->name('book.delete');
    Route::get('edit/{id}', 'BookController@edit')->name('book.edit');
});
