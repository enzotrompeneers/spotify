<?php

Route::get('/', 'HomeController@index'); 
Route::get('participate', 'ParticipateController@index'); 
Route::get('login', 'AdminController@index'); 
Route::get('participants', 'ParticipantsController@index'); 
Route::get('participants/{id}', 'ParticipantsController@show'); 