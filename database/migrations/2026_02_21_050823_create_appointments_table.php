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
        //Parametros iniciales de la base de datos, con la informacion del contenedor y a cual quiente pertenece
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->nullable();

            $table->foreignId('client_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('pickup_location');
            $table->string('delivery_location');

            $table->dateTime('loading_eta')->nullable();
            $table->dateTime('delivery_eta')->nullable();

            $table->enum('status',['pendiente','confirmed','loaded','shipped','delivered','cancelled'])
                ->default('pendiente');

            $table->string('gps')->nullable();

            $table->LongText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
