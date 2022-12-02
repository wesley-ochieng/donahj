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
        Schema::create('complimentary_tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('ticket_number');
            $table->foreignId('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('organization_name')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', ['active', 'used', 'unpaid', 'paid'])->default('unpaid');
            $table->string('qr_code')->nullable();
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
        Schema::dropIfExists('complimentary_tickets');
    }
};
