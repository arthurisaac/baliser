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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("device_model")->nullable();
            $table->boolean("capturePhoto")->default(false);
            $table->integer("capturePhotoPos")->default(0);
            $table->boolean("captureAudio")->default(false);
            $table->integer("captureAudioDuration")->default(10000);
            $table->boolean("show_app")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
