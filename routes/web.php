<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('deelnemen', 'DeelnemenController@index')->name('deelnemen');
Route::get('deelnemers', 'ParticipantsController@index'); 
Route::get('deelnemer/{id}', 'DeelnemerController@show')->name('deelnemer');
