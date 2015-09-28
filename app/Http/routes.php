<?php

Route::get('/', ['as' => 'zipcode', 'uses' => 'ZipCodeController@index']);
Route::get('/zipcode', ['as' => 'zipcode.index', 'uses' => 'ZipCodeController@index']);
Route::post('/zipcode/get', ['as' => 'zipcode.get', 'uses' => 'ZipCodeController@get']);

Route::get('/address', ['as' => 'address.index', 'uses' => 'AddressController@index']);
Route::post('/address/get', ['as' => 'address.get', 'uses' => 'AddressController@get']);
