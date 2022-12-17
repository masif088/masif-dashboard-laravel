<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $course_detail_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property CourseDetail $courseDetail
 * @property User $user
 */
class CourseRead extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['course_detail_id', 'user_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseDetail()
    {
        return $this->belongsTo('App\Models\CourseDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
