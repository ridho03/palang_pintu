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
        Schema::create('vehicle', function (Blueprint $table) {
            
            $table->id(); // Alias dari $table->bigIncrements('id'), Primary Key dengan AUTO_INCREMENT
            $table->unsignedBigInteger('id_user')->index('fk_vehicle_owner'); // Referensi ke user dengan tipe unsigned big integer
            $table->string('registrationNumber', 100)->index();
            $table->string('make', 200);
            $table->string('model', 200);
            $table->string('fuel', 100);
            $table->dateTime('last_change_oil');
            $table->integer('status_emisi');
            $table->integer('year');
            
            // Foreign Key
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade'); // Jika ingin menambahkan referensi ke tabel user
        });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
