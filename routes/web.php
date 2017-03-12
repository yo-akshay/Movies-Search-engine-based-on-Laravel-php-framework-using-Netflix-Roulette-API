<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome1');
});

Route::get('Title/{Title}/director/{director}/Actor/{Actor}', 'search_engine@update');

Route::get('foo', function () {
    return 'Hello World';
});