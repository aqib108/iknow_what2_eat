<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_mes', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar',50)->nullable();
            $table->string('title_en',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('type',50)->nullable();
            $table->string('social_name',50)->nullable();
            $table->string('_arbic',255)->nullable();
            $table->string('about_me_ar',255)->nullable();
            $table->string('about_me_en',255)->nullable();
            $table->string('stay_social_ar',255)->nullable();
            $table->string('stay_social_en',255)->nullable();
            $table->string('insta_url',50)->nullable();
            $table->string('snapchat_url',50)->nullable();
            $table->string('tiktok_url',50)->nullable();
            $table->string('youtube_url',50)->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_mes');
    }
};
