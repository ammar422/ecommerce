<?php

use App\Models\Language;
use Illuminate\Support\Facades\Route;



route::middleware('auth:admin')->group(function () {

    route::get('all_vendors', 'VendorController@index')->name('show');
    route::get('new_vendor', 'VendorController@create')->name('add');
    route::post('new_vendor', 'VendorController@store')->name('store');
    route::get('edit_vendor/{id}', 'VendorController@edit')->name('edit');
    route::post('update_vendor/{id}', 'VendorController@update')->name('update');
    route::post('delete_vendor/{lang_id}', 'VendorController@destroy')->name('delete');
});
