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
    return view('home');
});

Route::get('/profilepage', function () {
    return view('profilepage');
});

Route::get('/navbar', function () {
    return view('layouts/partials/navbar');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/login', function () {
    return view('loginPage');
});

Route::get('/addTestimony', function () {
    return view('addTestimony');
});

Route::resource('projects', 'ProjectsController');
Route::resource('galleries', 'GalleriesController');
Route::resource('testimonies', 'TestimoniesController');
