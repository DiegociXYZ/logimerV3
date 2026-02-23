<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'nombre',
        'placa',
        'tipo',
        'modelo',
        'status',
        'is_rented',
        'notes',
    ];

    public function trips(): BelongsToMany {
        return $this->belongsToMany(Appointment::class,'trip_vehicles','vehicle_id','appointment_id');
    }
}
