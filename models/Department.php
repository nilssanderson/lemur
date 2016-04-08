<?php namespace NilsSanderson\Jobs\Models;

use Model;

/**
 * Department Model
 */
class Department extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nilssanderson_jobs_departments';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'jobs' => [
            'NilsSanderson\Jobs\Models\Job',
            'table' => 'nilssanderson_jobs_jobs'
        ],
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}
