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
        Schema::create('bulk_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->string('ticket_number')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('initiation_time')->nullable();
            $table->text('details')->nullable();
            $table->string('transaction_status')->nullable();
            $table->string('amount')->nullable();
            $table->text('other_party')->nullable();
            $table->enum('status', ['paid', 'used'])->default('paid');
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
        Schema::dropIfExists('bulk_uploads');
    }
};
