<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Language;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/

define('PAGINATION_COUNT', 10);


route::group(['middleware' => 'auth:admin'], function () {

    route::get('dashboard', 'LoginController@dashboard')->name('dashboard');
    route::post('logout', 'LoginController@logout')->name('adminLogout');
});


route::group(['middleware' => 'guest:admin'], function () {

    route::get('login', 'LoginController@loginForm')->name('loginForm');
    route::post('login', 'LoginController@checkAdmin')->name('loginCheck');
});
