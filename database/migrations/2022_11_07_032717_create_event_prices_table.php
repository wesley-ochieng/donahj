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
        Schema::create('event_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->integer('regular_advance_price')->nullable();
            $table->integer('regular_gate_price')->nullable();
            $table->integer('vip_advance_price')->nullable();
            $table->integer('vip_gate_price')->nullable();
            $table->integer('vvip_advance_price')->nullable();
            $table->integer('vvip_gate_price')->nullable();
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
        Schema::dropIfExists('event_prices');
    }
};
