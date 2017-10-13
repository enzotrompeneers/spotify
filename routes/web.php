<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('deelnemen', 'DeelnemenController@index')->name('deelnemen');
Route::get('deelnemers', 'ParticipantsController@index')->name('deelnemers');
Route::get('deelnemer/{id}', 'DeelnemerController@show')->name('deelnemer.show');
