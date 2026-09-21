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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code')->unique();
            $table->string('name');
            $table->string('phone');
            $table->text('origin');
            $table->text('destination');
            $table->string('truck_type');
            $table->date('date');
            $table->string('status')->default('pending'); // pending, approved, in_transit, completed, cancelled
            $table->string('driver_name')->nullable();
            $table->string('plate_number')->nullable();
            $table->decimal('tracking_lat', 10, 7)->nullable();
            $table->decimal('tracking_lng', 10, 7)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
