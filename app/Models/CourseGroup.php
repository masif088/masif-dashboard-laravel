<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $course_id
 * @property string $title
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property CourseDetail[] $courseDetails
 * @property Course $course
 */
class CourseGroup extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['course_id', 'title', 'slug', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseDetails()
    {
        return $this->hasMany('App\Models\CourseDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
