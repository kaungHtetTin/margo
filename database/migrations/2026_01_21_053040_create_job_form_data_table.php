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
        Schema::create('job_form_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_form_id')->constrained('job_forms')->onDelete('cascade');
            $table->enum('type', ['image', 'text']);
            $table->string('title');
            $table->boolean('is_required')->default(false);
            $table->integer('order')->default(0)->comment('Display order for sorting form fields');
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('job_form_id');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_form_data');
    }
};
