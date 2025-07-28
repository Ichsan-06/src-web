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
        Schema::create('product_benefits', function (Blueprint $table) {
            $table->id();
            //title
            $table->string('title');
            //description
            $table->text('description');
            //foreign product_page_setting_id
            $table->foreignId('product_page_setting_id')->constrained('product_page_settings')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_benefits');
    }
};
