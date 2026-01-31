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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_applicant_id')->constrained('job_applicants')->onDelete('cascade');
            $table->foreignId('job_form_id')->constrained('job_forms')->onDelete('cascade');
            $table->foreignId('job_form_data_id')->constrained('job_form_data')->onDelete('cascade');
            $table->text('value')->nullable()->comment('Stores image URL or text input value');
            $table->timestamps();
            
            $table->index('job_applicant_id');
            $table->index('job_form_id');
            $table->index('job_form_data_id');
            $table->index(['job_applicant_id', 'job_form_id'], 'applicant_form_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
};
