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

define('PAGINATION_COUNT', 5);

route::group(['prefix' => 'admin'], function () {
    route::group(['middleware' => 'auth:admin'], function () {
        route::namespace('Auth\Admin')->group(function () {
            route::get('dashboard', 'LoginController@dashboard')->name('dashboard');
            route::post('logout', 'LoginController@logout')->name('adminLogout');
        });

        // begin languages routes 
        route::group(['prefix' => 'languages', 'namespace' => 'Admin'], function () {
            route::get('ShowAllLangs', 'LanguagesController@ShowAllLangs')->name('ShowAllLangs');
            route::get('addNewLangs', 'LanguagesController@addNewLangs')->name('addNewLangs');
            route::post('addNewLangs', 'LanguagesController@stroeLanguage')->name('stroeLanguage');
            route::get('deleteLanguage/{lang_id}', 'LanguagesController@deleteLanguage')->name('deleteLanguage');
            route::get('editeLanguage/{lang_id}', 'LanguagesController@editeLanguage')->name('editeLanguage');
            route::post('updateLanguage/{lang_id}', 'LanguagesController@updateLanguage')->name('updateLanguage');
        });
        // begin languages routes 
        // begin Main Categories routes 
        route::group(['prefix' => 'MainCategories', 'namespace' => 'Admin'], function () {
            route::get('ShowAllCategories', 'MainCategoryController@index')->name('ShowAllCategories');
            route::get('addNewCategories', 'MainCategoryController@create')->name('addNewCategories');
            route::post('addNewCategories', 'MainCategoryController@store')->name('storeCategories');
            route::get('deleteCategories/{lang_id}', 'MainCategoryController@destroy')->name('deleteCategories');
            route::get('editeCategories/{lang_id}', 'MainCategoryController@edit')->name('editCategories');
            route::post('updateCategories/{lang_id}', 'MainCategoryController@update')->name('updateCategories');

        });
        // end Main Categories routes 


        // begin vendors routes
        route::group(['prefix'=>'vendors','namespace'=>'Admin'],function(){
            
        });
        
        // end vendors routes

    });

    route::group(['middleware' => 'guest:admin'], function () {
        route::namespace('Auth\Admin')->group(function () {
            route::get('login', 'LoginController@loginForm')->name('loginForm');
            route::post('login', 'LoginController@checkAdmin')->name('loginCheck');
        });
    });
});
