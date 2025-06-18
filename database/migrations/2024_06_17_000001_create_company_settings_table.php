<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('company_name');
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('logo')->nullable();
            $table->string('letterhead')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_settings');
    }
}; 