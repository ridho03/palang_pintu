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
        Schema::create('capquota', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('vehicleID');
            $table->integer('initialQuota');
            $table->integer('currentQuota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capquota');
    }
};
