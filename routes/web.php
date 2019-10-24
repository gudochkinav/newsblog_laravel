<?php

Route::get('/', 'SiteController@index')->name('index');
Route::get('services', 'SiteController@services')->name('services');
Route::get('blog', 'SiteController@blog')->name('blog');
Route::get('portfolio', 'SiteController@portfolio')->name('portfolio');
Route::get('contact', 'SiteController@contact')->name('contact');
