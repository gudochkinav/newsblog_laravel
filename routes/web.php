<?php

Route::get('/', 'SiteController@index')->name('index');
Route::get('services', 'SiteController@services')->name('services');
Route::get('blog', 'SiteController@blog')->name('blog');
Route::get('blog/{name}', 'SiteController@article')->name('article');
Route::get('portfolio', 'SiteController@portfolio')->name('portfolio');
Route::get('contact', 'SiteController@contact')->name('contact');
Route::post('contact/feedback', 'SiteController@sendFeedback')->name('contact_feedback');
Route::post('subscribe', 'SubscribeController@subscribe')->name('subscribe');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('subscribers', 'AdminController@subscribers')->name('subscribers');
    Route::get('subscribers/add', 'AdminController@addSubscriber')->name('subscriber_add');
    Route::get('subscribers/edit/{id}', 'AdminController@editSubscriber')->name('subscriber_edit');
    Route::get('subscribers/delete/{id}', 'AdminController@deleteSubscriber')->name('subscriber_delete');
    Route::post('subscribers/update/{id}', 'AdminController@updateSubscriber')->name('subscriber_update');

    Route::get('services', 'AdminController@services')->name('services');
    Route::get('service/add', 'AdminController@addService')->name('service_add');
    Route::get('service/edite/{id}', 'AdminController@editService')->name('service_edit');
    Route::post('service/update/{id}', 'AdminController@updateService')->name('service_update');
    Route::get('service/delete/{id}', 'AdminController@deleteService')->name('service_delete');
    
    Route::get('testimonials', 'TestimonialController@testimonials')->name('testimonials');
    Route::get('testimonial/add', 'TestimonialController@addTestimonial')->name('testimonial_add');
    Route::get('testimonial/edit/{id}', 'TestimonialController@editTestimonial')->name('testimonial_edit');
    Route::post('testimonial/update/{id}', 'TestimonialController@update')->name('testimonial_update');
    Route::get('testimonial/delete/{id}', 'TestimonialController@deleteTestimonial')->name('testimonial_delete');
    
    Route::get('articles', 'ArticleController@articles')->name('articles');
    Route::get('article/add', 'ArticleController@add')->name('article_add');
    Route::get('article/edit/{id}', 'ArticleController@edit')->name('article_edit');
    Route::post('article/update/{id}', 'ArticleController@update')->name('article_update');
    Route::get('article/delete/{id}', 'ArticleController@delete')->name('article_delete');
    
    Route::get('portfolio', 'PortfolioController@portfolio')->name('portfolio');
    Route::get('portfolio/add', 'PortfolioController@add')->name('portfolio_add');
    Route::get('portfolio/edit/{id}', 'PortfolioController@edit')->name('portfolio_edit');
    Route::post('portfolio/update/{id}', 'PortfolioController@update')->name('portfolio_update');
    Route::get('portfolio/delete/{id}', 'PortfolioController@delete')->name('portfolio_delete');
    
    Route::get('categories', 'CategoryController@categories')->name('categories');
    Route::get('category/add', 'CategoryController@add')->name('category_add');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('category_edit');
    Route::post('category/update/{id}', 'CategoryController@update')->name('category_update');
    Route::get('category/delete/{id}', 'CategoryController@delete')->name('category_delete');
});