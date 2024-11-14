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
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_title')->nullable();
            $table->string('ban_subtitle')->nullable();
            $table->string('ban_button')->nullable();
            $table->string('ban_url')->nullable();
            $table->string('ban_img')->nullable();
            $table->string('ban_slug')->nullable();
            $table->integer('ban_creator')->nullable();
            $table->integer('ban_editor')->nullable();
            $table->integer('ban_status')->default(1);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('restored_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
