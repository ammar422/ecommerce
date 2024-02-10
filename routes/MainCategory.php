<?php
use Illuminate\Support\Facades\Route;
route::middleware('auth:admin')->group(function(){

    route::get('ShowAllCategories', 'MainCategoryController@index')->name('show');
    route::get('addNewCategories', 'MainCategoryController@create')->name('add');
    route::post('addNewCategories', 'MainCategoryController@store')->name('store');
    route::get('deleteCategories/{id}', 'MainCategoryController@destroy')->name('delete');
    route::get('editeCategories/{id}', 'MainCategoryController@edit')->name('edit');
    route::post('updateCategories/{id}', 'MainCategoryController@update')->name('update');
});