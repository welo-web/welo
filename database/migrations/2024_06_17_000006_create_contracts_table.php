<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->string('type')->default('subscription'); // نوع القالب: عقد اشتراك، عرض أسعار...
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('final_price', 10, 2);
            $table->text('terms')->nullable();
            $table->string('status')->default('draft'); // draft, sent, signed, ...
            $table->string('pdf_path')->nullable();
            $table->string('tracking_token')->nullable(); // رابط خاص للعميل
            $table->timestamps();

            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('template_id')->references('id')->on('contract_templates')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}; 