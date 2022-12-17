<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $room_id
 * @property integer $path_id
 * @property string $created_at
 * @property string $updated_at
 * @property Path $path
 * @property Room $room
 */
class RoomPath extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['room_id', 'path_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function path()
    {
        return $this->belongsTo('App\Models\Path');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
