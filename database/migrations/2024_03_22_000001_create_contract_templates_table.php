<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contract_templates', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('terms')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Temporarily removed foreign key constraint
            // $table->foreign('company_id')
            //       ->references('id')
            //       ->on('company_settings')
            //       ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contract_templates');
    }
}; 