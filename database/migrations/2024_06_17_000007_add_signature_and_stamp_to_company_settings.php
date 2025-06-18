<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->string('signature')->nullable()->after('letterhead');
            $table->string('stamp')->nullable()->after('signature');
        });
    }

    public function down()
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn(['signature', 'stamp']);
        });
    }
}; 