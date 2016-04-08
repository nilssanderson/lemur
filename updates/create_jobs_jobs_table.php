<?php namespace NilsSanderson\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateJobsJobsTable extends Migration
{

    public function up()
    {
        Schema::create('nilssanderson_jobs_jobs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('department_id');
            $table->string('title');
            $table->text('slug');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilssanderson_jobs_jobs');
    }

}
