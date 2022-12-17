<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $slug
 * @property string $icon
 * @property string $created_at
 * @property string $updated_at
 */
class FileType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'icon', 'created_at', 'updated_at'];
}
