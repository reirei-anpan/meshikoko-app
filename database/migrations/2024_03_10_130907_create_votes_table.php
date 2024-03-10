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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquete_id');
            $table->string('name');
            $table->string('location');
            $table->dateTime('reservation_time');
            $table->string('cuisine_type');
            $table->string('ambiance');
            $table->timestamps();

            $table->foreign('enquete_id')->references('id')->on('enquetes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
