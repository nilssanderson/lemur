<?php namespace NilsSanderson\Jobs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateJobsDepartmentsTable extends Migration
{

    public function up()
    {
        Schema::create('nilssanderson_jobs_departments', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('slug');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilssanderson_jobs_departments');
    }

}
