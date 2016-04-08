<?php namespace NilsSanderson\Jobs\Components;

use NilsSanderson\Jobs\Models\Department;
use NilsSanderson\Jobs\Models\Job;
use Cms\Classes\ComponentBase;

class JobList extends ComponentBase
{

    /**
     * This contains a list of departments
     * @array \NilsSanderson\Jobs\Models\Department
     */
    public $departments;
    public $department;

    /**
     * This contains a list of items
     * @array \NilsSanderson\Jobs\Models\Job
     */
    public $jobs;

    public function componentDetails()
    {
        return [
            'name'        => 'Jobs - JobList',
            'description' => 'Provides a list of items.'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxJobs' => [
                'title'             => 'Max items',
                'description'       => 'The maximum amount of items for this instance',
                'default'           => 20,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Jobs property can contain only numeric symbols'
            ]
        ];
    }

    public function getDepartmentOptions()
    {
        return $this->departments = Department::lists('name', 'id'); // lists: Returns key and value
    }

    public function init()
    {
        // This will run when the component is first initialised,
        // including ajax requests
    }

    public function onRun()
    {
        // This code will not execute for ajax requests
        $this->jobs = $this->page['jobs'] = Job::take($this->property('maxJobs'))
            ->get();

        $this->department = Department::where('slug', $this->param('department_slug'))->first();

        if ($this->department) {
            $department_id = $this->department->id;
            $this->jobs = $this->page['jobs'] = Job::whereHas('department', function($query) use ($department_id){
                $query->where('department_id', $department_id);
            })
            ->take($this->property('maxJobs'))
            ->get();
        } else {
            $this->jobs = $this->page['jobs'] = Job::all();
        }
    }

}
