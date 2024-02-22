<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;



route::middleware('auth:admin')->group(function () {

    route::resource('vendor', 'VendorController')
        ->missing(function () {
            return Redirect::route('vendor.index')->with(['error' => 'soory can\'t resolve your request']);
        });
    route::get('cahngeStatus/{id}', 'VendorController@changeStatus')->name('vendor.changeStatus');
});
