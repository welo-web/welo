<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->json('features')->nullable();
            $table->decimal('basic_price', 10, 2);
            $table->decimal('advanced_price', 10, 2);
            $table->decimal('professional_price', 10, 2);
            $table->json('basic_features')->nullable();
            $table->json('advanced_features')->nullable();
            $table->json('professional_features')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}; 