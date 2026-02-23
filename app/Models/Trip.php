<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Trip extends Model
{
    protected $fillable = [
        'appointment_id',
        'driver_id',
        'is_burrito',
        'pickup_location',
        'delivery_location',
        'loading_eta',
        'delivery_eta',
        'status',
        'diesel_cost',
        'diesel_liters',
        'kilometraje_start',
        'kilometraje_end',
        'notes',
    ];

    public function appointment() :BelongsTo {
        return $this->belongsTo(Appointment::class);
    }

    public function driver() :BelongsTo {
        return $this->belongsTo(Driver::class);
    }
    public function vehicles() :BelongsToMany {
        return $this->belongsToMany(Vehicle::class, 'trip_vehicles');
    }
}
