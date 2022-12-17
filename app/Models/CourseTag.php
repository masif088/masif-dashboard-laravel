<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $course_id
 * @property integer $tag_id
 * @property string $created_at
 * @property string $updated_at
 * @property Course $course
 * @property Tag $tag
 */
class CourseTag extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['course_id', 'tag_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
