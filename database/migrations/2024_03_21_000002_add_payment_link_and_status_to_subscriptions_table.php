<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->text('payment_link')->nullable()->after('status');
            $table->string('payment_status')->default('pending')->after('payment_link');
        });
    }

    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['payment_link', 'payment_status']);
        });
    }
}; 