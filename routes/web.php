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

use App\Http\Controllers\Trip;
use App\Http\Controllers\Fligh;
use App\Http\Controllers\Train;



Route::get('/', [
    'as' => 'welcome',
    'uses' => 'Trip@toWelcome']);

