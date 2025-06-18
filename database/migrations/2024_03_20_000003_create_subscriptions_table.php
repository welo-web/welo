<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('plan_type');
            $table->string('subscription_type');
            $table->decimal('price', 10, 2);
            $table->string('customer_name');
            $table->text('address');
            $table->string('phone');
            $table->string('status')->default('pending');
            $table->boolean('whatsapp_sent')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}; 