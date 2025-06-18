<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->enum('importance', ['high', 'medium', 'low'])->default('medium')->after('status');
        });
    }

    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('importance');
        });
    }
}; 