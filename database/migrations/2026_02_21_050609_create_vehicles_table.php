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
        //tabla de vehiculos
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');

            $table->string('placa')
                ->unique();

            $table->enum('tipo', ['camion','remolque','dolly'])
                ->default('remolque');

            $table->string('modelo')
                ->nullable();

            $table->enum('status',['disponible','no_disponible','mantenimiento']) //should i add in_use?????
                ->default('disponible');

            $table->boolean('is_rented')
                ->default(false);

            $table->text('notes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
