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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('dateTime')->nullable();
            $table->string('nameImage')->nullable();
            $table->string('text')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('urlImage')->nullable();
            $table->string('uuid')->nullable();
            $table->integer('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
