<?php

use App\Models\Language;
use App\Models\MainCategorie;
use Illuminate\Support\Facades\Config;

/**
 * activeLang
 * return all active languages 
 * @return void
 */
function activeLang()
{
    return
        Language::active()->selection()->get();
}

function get_default_language()
{
    return  Config::get('app.locale');
}

function uploadImage($folder, $photo)
{
    $photo->store('/',$folder);
    $filename=$photo->hashName();
    $path='imags/'. $folder . '/' . $filename ;
    return $path;
}

function getNotDefaultLangs()
{
    return Language::active()->selection()->NotDefault()->get();
}


function getNotactiveLang()
{
    return
        Language::Notactive()->selection()->get();
}



function DefaultMainCategory(){
    return
    MainCategorie::DefaultMainCategory()->Selection();
  }
    

