<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('');
// });

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/rooms', function () {
    return view('pages.rooms');
});

Route::get('/events', function () {
    return view('pages.events');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/reservation', function () {
    return view('pages.reservation');
});