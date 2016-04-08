<?php namespace NilsSanderson\Jobs\Models;

use Model;

/**
 * Job Model
 */
class Job extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'nilssanderson_jobs_jobs';

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
    public $hasMany = [];
    public $belongsTo = [
        'department' => [
            'NilsSanderson\Jobs\Models\Department',
            'table' => 'nilssanderson_jobs_jobs'
        ],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}
