<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;



route::middleware('auth:admin')->group(function () {

    route::resource('vendor', 'VendorController')
        ->missing(function (Request $request) {
            return Redirect::route('vendor.index');
        });
});
