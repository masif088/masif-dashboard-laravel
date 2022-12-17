<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property RoomPath[] $roomPaths
 */
class Path extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomPaths()
    {
        return $this->hasMany('App\Models\RoomPath');
    }
}
