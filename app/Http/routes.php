<?php
Route::get('/', function () {
    return view('welcome');
});

Route::any('/index','IndexController@index');
Route::any('/query','IndexController@query');
Route::group(['middleware' => ['web']], function () {
    //
});
