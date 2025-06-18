<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
        // إضافة عمود client_id للاشتراكات
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable()->after('id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropColumn('client_id');
        });
        Schema::dropIfExists('clients');
    }
}; 