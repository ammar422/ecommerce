<?php

use Illuminate\Support\Facades\Route;

route::middleware('auth:admin')->group(function () {

    route::get('ShowAllLangs', 'LanguagesController@ShowAllLangs')->name('show');
    route::get('addNewLangs', 'LanguagesController@addNewLangs')->name('add');
    route::post('addNewLangs', 'LanguagesController@stroeLanguage')->name('store');
    route::get('deleteLanguage/{lang_id}', 'LanguagesController@deleteLanguage')->name('delete');
    route::get('editeLanguage/{lang_id}', 'LanguagesController@editeLanguage')->name('edit');
    route::post('updateLanguage/{lang_id}', 'LanguagesController@updateLanguage')->name('update');
});
