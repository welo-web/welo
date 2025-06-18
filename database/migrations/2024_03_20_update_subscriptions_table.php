<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('subscriptions', 'service_id')) {
                $table->foreignId('service_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('subscriptions', 'plan_type')) {
                $table->string('plan_type');
            }
            if (!Schema::hasColumn('subscriptions', 'subscription_type')) {
                $table->string('subscription_type');
            }
            if (!Schema::hasColumn('subscriptions', 'customer_name')) {
                $table->string('customer_name');
            }
            if (!Schema::hasColumn('subscriptions', 'address')) {
                $table->text('address');
            }
            if (!Schema::hasColumn('subscriptions', 'status')) {
                $table->string('status')->default('pending');
            }
            if (!Schema::hasColumn('subscriptions', 'whatsapp_sent')) {
                $table->boolean('whatsapp_sent')->default(false);
            }
        });
    }

    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropColumn([
                'service_id',
                'plan_type',
                'subscription_type',
                'customer_name',
                'address',
                'status',
                'whatsapp_sent'
            ]);
        });
    }
}; 