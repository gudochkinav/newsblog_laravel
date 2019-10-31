<?php
Route::get('/', 'SiteController@index')->name('index');
Route::get('services', 'SiteController@services')->name('services');
Route::get('blog', 'SiteController@blog')->name('blog');
Route::get('blog/{name}', 'SiteController@article')->name('article');
Route::get('portfolio', 'SiteController@portfolio')->name('portfolio');
Route::get('contact', 'SiteController@contact')->name('contact');
Route::post('contact/feedback', 'SiteController@sendFeedback')->name('contact_feedback');
Route::post('subscribe', 'SubscribeController@subscribe')->name('subscribe');
