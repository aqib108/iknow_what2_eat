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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar',50)->nullable();
            $table->string('title_en',50)->nullable();
            $table->integer('price_en')->nullable();
            $table->integer('price_ar')->nullable();
            $table->boolean('new_in_town')->default(0);
            $table->string('additional_price_en',50)->nullable();
            $table->string('additional_price_ar',50)->nullable();
            $table->string('phone_country_code',20)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('intsa_handle',255)->nullable();
            $table->string('res_description_en',255)->nullable();
            $table->string('res_description_ar',255)->nullable();
            $table->string('meat_poultry_source_en',255)->nullable();
            $table->string('meat_poultry_source_ar',255)->nullable();
            $table->string('social_sites',255)->nullable();
            $table->string('status')->nullable('Active');
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
        Schema::dropIfExists('restaurants');
    }
};
