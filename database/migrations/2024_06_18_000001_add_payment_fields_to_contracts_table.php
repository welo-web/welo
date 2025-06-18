<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('final_price');
            $table->string('payment_note')->nullable()->after('payment_method');
            $table->string('payment_attachment')->nullable()->after('payment_note');
        });
    }

    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'payment_note', 'payment_attachment']);
        });
    }
}; 