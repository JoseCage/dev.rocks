<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('summary', 300)->nullable();
            $table->text('context')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_open')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->uuid('job_type_id')->index();
            $table->uuid('company_id')->index();
            $table->string('image')->nullable();
            $table->dateTime('due_date');
            $table->string('url')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_type_id')->references('id')->on('job_types');
            $table->foreign('company_id')->references('id')->on('companies');
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
