<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('paytabs_profile_id')->nullable();
            $table->string('paytabs_server_key')->nullable();
            $table->string('paytabs_currency')->default('SAR');
        });
    }

    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['paytabs_profile_id', 'paytabs_server_key', 'paytabs_currency']);
        });
    }
}; 