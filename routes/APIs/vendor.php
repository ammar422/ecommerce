<?php
use Illuminate\Support\Facades\Route;



route::post('show','VendorApiController@index');
route::post('new_vendor','VendorApiController@store');
