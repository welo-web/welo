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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id'); // ربط الباقة بالخدمة
            $table->string('name'); // اسم الباقة (مثلاً: باقة لايت)
            $table->string('color')->nullable(); // لون الباقة (اختياري)
            $table->text('description')->nullable(); // وصف الباقة
            $table->decimal('price_monthly')->nullable();
            $table->decimal('price_yearly')->nullable();
            $table->text('features')->nullable(); // مميزات الباقة (نص أو JSON)
            $table->string('youtube_link')->nullable();
            $table->string('slug')->unique(); // رابط فريد للباقة
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
