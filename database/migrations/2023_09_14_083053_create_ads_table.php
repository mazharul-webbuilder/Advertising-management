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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('add_type', ['image', 'video', 'custom']);
            $table->enum('target_audience', ['male', 'female']);
            $table->double('duration');
            $table->string('ad_file')->nullable();
            $table->integer('total_ads')->comment('how many ad or overall number of ads want to purchase');
            $table->integer('per_device')->comment('how many time want to show a user in a day');
            $table->integer('days')->comment('how many days want to show this ad');
            $table->boolean('published')->default(false);
            $table->timestamps();


            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
