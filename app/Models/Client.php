<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Client extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
    ];

    public function appointment() :HasMany {
        return $this->hasMany(Appointment::class);
    }
}
