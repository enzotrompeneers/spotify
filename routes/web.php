<?php

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');


Route::get('deelnemers', 'ParticipantsController@index')->name('deelnemers');
Route::get('deelnemer/{id}', 'DeelnemerController@show')->name('deelnemer.show');



Route::get('deelnemen', 'SpotifyController@show')->name('spotify.show');
Route::post('deelnemen', 'DeelnemerController@store')->name('deelnemer.store');

Route::post('admin', 'AdminController@update')->name('admin.update');

Route::get('datum', 'DatumController@show')->name('datum.show');
Route::post('datum', 'DatumController@create')->name('datum.create');
