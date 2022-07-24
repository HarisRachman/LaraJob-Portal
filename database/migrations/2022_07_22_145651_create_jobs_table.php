<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('job_types')->onDelete('restrict');
            $table->foreignId('joblevel_id')->constrained('job_levels')->onDelete('restrict');
            $table->string('job_title');
            $table->string('education');
            $table->string('category');
            $table->string('experience');
            $table->string('work_time');
            $table->string('job_location');
            $table->text('job_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
