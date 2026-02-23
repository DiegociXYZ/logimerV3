<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'is_burrito',
    ];
    public function trips():HasMany {
        return $this->hasMany(Trip::class);
    }
}
