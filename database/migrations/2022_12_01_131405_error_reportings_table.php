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
        Schema::create('error_reportings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('error_type_id')->nullable();
            $table->foreign('error_type_id')->references('id')->on('error_types')->onDelete('cascade');
            $table->string('name',50);
            $table->string('message',255);
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
        Schema::dropIfExists('error_reportings');
    }
};
