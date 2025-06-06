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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('url');
            $table->string('resource_url');
            $table->integer('click_count')->default(0);
            $table->integer('count_tiktok')->default(0);
            $table->integer('count_facebook')->default(0);
            $table->integer('count_youtube')->default(0);
            $table->integer('count_instagram')->default(0);
            $table->integer('count_whatsapp')->default(0);
            $table->boolean('state')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
