<?php namespace NilsSanderson\Jobs\Updates;

use Seeder;
use DB;
use NilsSanderson\Jobs\Models\Department;

class SeedDepartmentsTable extends Seeder
{
    public function run()
    {
        Department::truncate();
        DB::table('nilssanderson_jobs_departments')->truncate();

        Department::insert([
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'Design Jobs'
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'description' => 'Marketing Jobs'
            ],
            [
                'name' => 'Programming',
                'slug' => 'programming',
                'description' => 'Programming Jobs'
            ]
        ]);
    }
}
