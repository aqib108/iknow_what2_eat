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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_code',30)->nullable();
            $table->string('restuarant_name',255)->nullable();
            $table->string('description',255)->nullable();
            $table->string('expiry_date')->nullable();
            $table->boolean('no_expiry')->default(false);
            $table->string('logo',255)->nullable();
            // $table->unsignedBigInteger('restaurant_id')->nullable();
            // $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->boolean('status')->default(1);
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
        //
    }
};
