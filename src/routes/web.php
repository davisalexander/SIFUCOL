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
    return view('index');
});

Route::get('home', function () {
    return view('templates.home');
});

/*Route::get('people', function () {
    return view('templates.people');
});*/

Route::get('chart1', function () {
    return view('charts.example1');
});

Route::get('chart2', function () {
    return view('charts.example2');
});


Route::resource('people', 'PersonaController');
