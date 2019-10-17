<?php

Route::get('/', function () {
    return view('index')->with(['content' => 'content']);
});
