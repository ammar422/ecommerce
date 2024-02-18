<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use HasFactory , Notifiable;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'active',
        'category_id',
        'google_map_address',
        'logo'
    ];
    protected $hidden = [
        // 'category_id',
    ];


    // geter area

    public function getActiveAttribute($val)
    {
        return $val == 1 ? 'Active' : 'Not Active';
    }




    // scope area ---------------
    public function scopeSelection($query)
    {
        return $query->select([
            'id',
            'name',
            'email',
            'phone',
            'active',
            'category_id',
            'logo',
            'google_map_address'
        ]);
    }
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }


    // relations
    public function category(): BelongsTo
    {
        return $this->belongsTo(MainCategorie::class, 'category_id', 'id');
    }




    public function getLogoAttribute($val)
    {
        return $val = "http://localhost/ecommerce/uploads/admin/" . $val;
    }

    protected function logo(): Attribute
    {
        return new Attribute(

            set: fn ($value) => uploadImage('vendors', $value)
        );
    }
}
