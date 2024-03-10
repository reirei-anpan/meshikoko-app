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
        Schema::create('enquetes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('event_name');
            $table->string('location'); //場所
            $table->dateTime('reservation_time'); //予約時間
            $table->string('cuisine_type'); //食事系統
            $table->string('ambiance'); //雰囲気
            $table->string('unique_identifier'); //URL生成に使用する一意な値
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquetes');
    }
};
