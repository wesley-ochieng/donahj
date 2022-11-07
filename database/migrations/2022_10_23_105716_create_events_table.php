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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->string('start_time')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('venue')->nullable();
            $table->string('venue_latitude')->nullable();
            $table->string('venue_longitude')->nullable();
            $table->string('venue_address')->nullable();
            $table->string('poster_image')->nullable();
            $table->enum('status', ['active', 'upcoming', 'passed']);
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
        Schema::dropIfExists('events');
    }
};
