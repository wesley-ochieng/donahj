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
        Schema::table('event_prices', function (Blueprint $table) {
            $table->integer('kids_quantity')->nullable()->after('vvip_gate_price');
            $table->integer('kids_advance_price')->nullable()->after('kids_quantity');
            $table->integer('kids_gate_price')->nullable()->after('kids_advance_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_prices', function (Blueprint $table) {
            $table->dropColumn('kids_quantity');
            $table->dropColumn('kids_advance_price');
            $table->dropColumn('kids_gate_price');
        });
    }
};
