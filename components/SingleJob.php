<?php namespace NilsSanderson\Jobs\Components;

use NilsSanderson\Jobs\Models\Department;
use NilsSanderson\Jobs\Models\Job;
use Cms\Classes\ComponentBase;

class SingleJob extends ComponentBase
{

    /**
     * This contains a list of departments
     * @array \NilsSanderson\Jobs\Models\Department
     */
    public $departments;
    public $job;

    /**
     * This contains a list of items
     * @array \NilsSanderson\Jobs\Models\Job
     */
    public $jobs;

    public function componentDetails()
    {
        return [
            'name'        => 'Jobs - SingleJob',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'id' => [
                'title'       => 'ID',
                'description' => 'Department ID of the item',
                'default'     => '{{ :id }}',
                'type'        => 'number'
            ]
        ];
    }

    public function init()
    {
        // This will run when the component is first initialised,
        // including ajax requests
        $this->jobs = $this->page['jobs'] = Job::where('department_id', $this->property('id'))
            ->get();

        $this->department = $this->page['department'] = Department::where('id', $this->property('id'))->first();

        $this->job = Job::where('slug', $this->param('job_slug'))->first();
    }

    public function onRun()
    {
        // This code will not execute for ajax requests
        // including ajax requests
        $this->jobs = $this->page['jobs'] = Job::where('department_id', $this->property('id'))
            ->get();

        $this->department = $this->page['department'] = Department::where('id', $this->property('id'))->first();

        $this->job = Job::where('slug', $this->param('job_slug'))->first();
    }

}
