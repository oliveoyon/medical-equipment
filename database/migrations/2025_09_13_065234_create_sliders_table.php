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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_h5')->nullable();        // small title (h5)
            $table->string('title_h1')->nullable();        // main title (h1)
            $table->text('description')->nullable();       // description (p)
            $table->string('button_url')->nullable();      // button redirect URL
            $table->string('image');                       // image path (required)
            $table->boolean('status')->default(true);      // active/inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
