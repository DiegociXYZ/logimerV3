<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Appointment extends Model
{
    protected $fillable = [
        'reference_number',
        'client_id',
        'pickup_location',
        'delivery_location',
        'loading_eta',
        'delivery_eta',
        'status',
        'gps',
        'notes',
    ];
    protected $cast = [
        'loading_eta' => 'datetime',
        'delivery_eta' =>'datatime',
    ];

    public function client():BelongsTo {
        return $this->belongsTo(Client::class);
    }

    public function trips() :HasMany {
        return $this->hasMany(Trip::class);
    }
}
