<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $room_id
 * @property integer $status
 * @property string $title
 * @property string $slug
 * @property string $release
 * @property string $created_at
 * @property string $updated_at
 * @property CourseGroup[] $courseGroups
 * @property CourseTag[] $courseTags
 * @property Room $room
 * @property Status $status
 * @property UserHaveCourse[] $userHaveCourses
 */
class Course extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['room_id', 'status', 'title', 'slug', 'release', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseGroups()
    {
        return $this->hasMany('App\Models\CourseGroup');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseTags()
    {
        return $this->hasMany('App\Models\CourseTag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
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
    public function userHaveCourses()
    {
        return $this->hasMany('App\Models\UserHaveCourse');
    }
}
