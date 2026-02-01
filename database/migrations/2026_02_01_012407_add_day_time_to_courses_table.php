<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('day')->nullable()->after('duration');
            $table->string('time')->nullable()->after('day');
        });

        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropForeign(['teacher_id']);
            });
            DB::statement('ALTER TABLE courses MODIFY teacher_id BIGINT UNSIGNED NULL');
            Schema::table('courses', function (Blueprint $table) {
                $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['day', 'time']);
        });
        $driver = Schema::getConnection()->getDriverName();
        if ($driver === 'mysql') {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropForeign(['teacher_id']);
            });
            DB::statement('ALTER TABLE courses MODIFY teacher_id BIGINT UNSIGNED NOT NULL');
            Schema::table('courses', function (Blueprint $table) {
                $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            });
        }
    }
};
