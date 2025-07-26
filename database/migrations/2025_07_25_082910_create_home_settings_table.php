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
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            //Profile
            $table->string('company_name')->nullable();
            $table->string('company_description')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();

            //Section 1
            $table->string('section_1_title')->nullable();
            $table->string('section_1_sub_title')->nullable();
            $table->string('section_1_description')->nullable();

            //Section 2
            $table->string('section_2_title')->nullable();
            $table->string('section_2_sub_title')->nullable();
            $table->string('section_2_banner')->nullable();



            //Section 3
            $table->string('section_3_title')->nullable();
            $table->string('section_3_sub_title')->nullable();
            $table->string('video_1')->nullable();
            $table->integer('registered_shop')->nullable();
            $table->integer('wholesale_partners')->nullable();
            $table->integer('paguyuban_src')->nullable();
            $table->integer('bumn_partner')->nullable();
            $table->integer('total_province')->nullable();

            //Section 4
            $table->string('section_4_title')->nullable();
            $table->string('section_4_sub_title')->nullable();

            //Section 5
            $table->string('section_5_title')->nullable();
            $table->string('section_5_sub_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
