<?php namespace NilsSanderson\Jobs;

use Backend;
use System\Classes\PluginBase;

/**
 * Instructions Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Jobs',
            'description' => 'No description provided yet...',
            'author'      => 'Nils Sanderson',
            'icon'        => 'icon-briefcase'
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'jobs' => [
                'label'       => 'Jobs',
                'url'         => Backend::url('nilssanderson/jobs/job'),
                'icon'        => 'icon-briefcase',
                'permissions' => ['nilssanderson.jobs.*'],
                'order'       => 500,

                'sideMenu' => [
                    'new_item' => [
                        'label'       => 'New Job',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('nilssanderson/jobs/job/create'),
                        'permissions' => ['nilssanderson.jobs.access_items']
                    ],
                    'jobs' => [
                        'label'       => 'Jobs',
                        'icon'        => 'icon-tags',
                        'url'         => Backend::url('nilssanderson/jobs/job'),
                        'attributes'  => ['data-menu-item'=>'job'],
                        'permissions' => ['nilssanderson.jobs.access_items']
                    ],
                    'departments' => [
                        'label'       => 'Departments',
                        'icon'        => 'icon-list',
                        'url'         => Backend::url('nilssanderson/jobs/department'),
                        'attributes'  => ['data-menu-item'=>'department'],
                        'permissions'  => ['nilssanderson.jobs.access_departments']
                    ],
                ],
            ],
        ];
    }

    /**
     * Registers any components included with the plugin
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'NilsSanderson\Jobs\Components\DepartmentList' => 'departmentList',
            'NilsSanderson\Jobs\Components\SingleJob' => 'singleJob',
            'NilsSanderson\Jobs\Components\JobList' => 'jobList',
            'NilsSanderson\Jobs\Components\JobMenu' => 'jobMenu'
        ];
    }

    /**
     * Registers back-end permission items for this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'nilssanderson.jobs.access_items' => [
                'label' => 'Manage the job items',
                'tab' => 'Jobs'
            ],
            'nilssanderson.jobs.access_departments' => [
                'label' => 'Manage the job departments',
                'tab' => 'Departments'
            ],
        ];

    }

}
