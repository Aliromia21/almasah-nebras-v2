<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
{
    Schema::create('farm_visits', function (Blueprint $table) {
        $table->id();
        $table->string('title')->default('زوروا مزرعتنا');
        $table->text('description')->nullable();
        $table->string('button_text')->default('زرنا الآن');
        $table->string('button_link')->nullable();
        $table->string('background_color')->default('bg-primary');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('farm_visits');
    }
};
