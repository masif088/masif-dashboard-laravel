<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $course_group_id
 * @property integer $course_type_id
 * @property integer $status
 * @property string $title
 * @property string $content
 * @property string $release
 * @property string $created_at
 * @property string $updated_at
 * @property CourseGroup $courseGroup
 * @property CourseType $courseType

 * @property CourseRead[] $courseReads
 */
class CourseDetail extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['course_group_id', 'course_type_id', 'status', 'title', 'content', 'release', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseGroup()
    {
        return $this->belongsTo('App\Models\CourseGroup');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseType()
    {
        return $this->belongsTo('App\Models\CourseType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseReads()
    {
        return $this->hasMany('App\Models\CourseRead');
    }
}
