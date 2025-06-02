<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


// home page
Route::view('/', 'home');
// Contact page
Route::view('/contact', 'contact');


// JobController
Route::resource('jobs', JobController::class)->except([]);

