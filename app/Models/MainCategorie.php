<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class MainCategorie extends Model
{
    use HasFactory ,Notifiable ;
    protected $fillable = [
        'name',
        'translation_lang',
        'translation_of',
        'slug',
        'photo',
        'active',
        'emailcreator',
    ];
    protected $hidden = [];



    // start scopes area 
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeDefaultMainCategory($query)
    {
        return $query->where('translation_of', 0);
    }


    public function scopeSelection($query)
    {
        return $query->select('id', 'name', 'translation_lang', 'translation_of', 'slug', 'photo', 'active')->get();
    }

    // end scopes area 



    // start geter area 
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($val) => "http://localhost/ecommerce/uploads/admin/" . $val
        );
    }

    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'active' : 'not active';
    }


    // end geter area 


    // start seter area 



    // end seter area 



    // start relations area 

    public function translatedCatrgories()
    {
        return
            $this->hasMany(self::class, 'translation_of');
    }

    public function vendors()
    {
        return
            $this->hasMany(Vendor::class, 'category_id', 'id');
    }

    // end relations area 



}
