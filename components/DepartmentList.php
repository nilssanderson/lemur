<?php namespace NilsSanderson\Jobs\Components;

use NilsSanderson\Jobs\Models\Department;
use NilsSanderson\Jobs\Models\Job;
use Cms\Classes\ComponentBase;

class DepartmentList extends ComponentBase
{

    /**
     * This contains a list of departments
     * @array \NilsSanderson\Jobs\Models\Department
     */
    public $departments;

    /**
     * This contains a list of departments
     * @array \NilsSanderson\Jobs\Models\Job
     */
    public $jobs;

    public function componentDetails()
    {
        return [
            'name'        => 'Jobs - DepartmentList',
            'description' => 'Provides a list of departments.'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxDepartments' => [
                'title'             => 'Max items',
                'description'       => 'The maximum amount of departments for this instance',
                'default'           => 20,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Departments property can contain only numeric symbols'
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
        $this->departments = $this->page['departments'] = Department::take($this->property('maxDepartments'))
            ->get();
    }

    public function onRun()
    {
        // This code will not execute for ajax requests
        $this->departments = $this->page['departments'] = Department::take($this->property('maxDepartments'))
            ->get();
    }

}
