<?php

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');

Route::get('deelnemen', 'DeelnemenController@index')->name('deelnemen.index');
Route::get('deelnemen/create/{contest_id}', 'DeelnemenController@create')->name('deelnemen.create');

Route::get('wedstrijdverantwoordelijke', 'WedstrijdverantwoordelijkeController@index')->name('wedstrijdverantwoordelijke.index');
Route::post('wedstrijdverantwoordelijke', 'WedstrijdverantwoordelijkeController@update')->name('wedstrijdverantwoordelijke.update');

Route::resource('datum', 'DatumController');
