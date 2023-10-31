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
            $table->string('regular_end_date')->nullable()->after('regular_gate_price');
            $table->string('vip_end_date')->nullable()->after('vip_gate_price');
            $table->string('vvip_end_date')->nullable()->after('vvip_gate_price');
            $table->string('kids_end_date')->nullable()->after('kids_gate_price');



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
            $table->dropColumn('regular_end_date');
            $table->dropColumn('vip_end_date');
            $table->dropColumn('vvip_end_date');
            $table->dropColumn('kids_end_date');

        });
    }
};
