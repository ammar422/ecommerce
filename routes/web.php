<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('site.site');
})->middleware('auth');

Auth::routes(['verify'=>true]);

Route::get('/site', [App\Http\Controllers\HomeController::class, 'index'])->name('site');


// route::get ('tst',function(){
//    return collect( activeLang())->count()>1?'true':'false';
// });