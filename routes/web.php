<?php

Route::get('/', 'HomeController@index'); 
Route::get('participate', 'PartcicipateController@index'); 
Route::get('admin', 'AdminController@index'); 
Route::get('participants', 'ParticipantsController@index'); 
Route::get('participants/{$id}', 'ParticipantsController@show'); 