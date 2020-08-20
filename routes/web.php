<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Home\MainController@index')->name('site.main');

Auth::routes();



