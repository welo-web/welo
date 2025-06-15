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
        Schema::table('subscribe', function (Blueprint $table) {
            $table->string('status')->default('pending');
            $table->string('importance')->default('normal');
            $table->string('pay_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscribe', function (Blueprint $table) {
            $table->dropColumn(['status', 'importance', 'pay_link']);
        });
    }
};
