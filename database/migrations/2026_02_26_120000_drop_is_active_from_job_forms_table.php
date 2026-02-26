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
        Schema::table('job_forms', function (Blueprint $table) {
            if (Schema::hasColumn('job_forms', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_forms', function (Blueprint $table) {
            if (!Schema::hasColumn('job_forms', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }
};
