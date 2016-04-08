<?php namespace NilsSanderson\Jobs\Components;

use NilsSanderson\Jobs\Models\Department;
use NilsSanderson\Jobs\Models\Job;
use Cms\Classes\ComponentBase;

class JobMenu extends ComponentBase
{

    /**
     * This contains a list of departments
     * @array \NilsSanderson\Jobs\Models\Department
     */
    public $departments;

    /**
     * This contains a list of items
     * @array \NilsSanderson\Jobs\Models\Job
     */
    public $menuJobs;

    public function componentDetails()
    {
        return [
            'name'        => 'Jobs - JobMenu',
            'description' => 'Provides a menu to jump to items.'
        ];
    }

    public function defineProperties()
    {
        return [
            'department' => [
                'title'             => 'Department',
                'description'       => 'Department of items to display',
                'default'           => 'Department 1',
                'type'              => 'dropdown',
                'placeholder'       => 'Select Department'
            ],
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
        $this->menuJobs = $this->page['menuJobs'] = Job::where('department_id', $this->property('department'))
            ->take($this->property('maxJobs'))
            ->get();
    }

}
