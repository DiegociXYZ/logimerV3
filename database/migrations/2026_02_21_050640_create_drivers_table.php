<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //lista de los choferes y si son burritos (burrito  un contractor que nos hace un trabajo en espesifico)
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono')
                ->nullable();
            $table->boolean('is_burrito')
                ->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
