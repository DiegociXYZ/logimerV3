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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();

            $table->foreignId('appointment_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('vehicle_id')
                ->constrained()
                ->nullable()
                ->onDelete('set null');

            $table->foreignId('driver_id')
                ->constrained()
                ->onDelete('set null')
                ->nullable();

            $table->boolean('is_burrito')
                ->default(false);

            $table->string('pickup_location');
            $table->string('delivery_location');

            $table->dateTime('loading_eta')->nullable();
            $table->dateTime('delivery_eta')->nullable();

            $table->enum('status',['agendado','in_progress','delayed','completed','cancelled'])
                ->default('agendado');

            $table->LongText('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
