<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $text
 * @property string $number
 * @property string $email
 * @property string $password
 * @property string $file
 * @property string $date
 * @property string $time
 * @property string $datetime-local
 * @property string $select
 * @property string $select2
 * @property string $textarea
 * @property string $editor
 * @property string $created_at
 * @property string $updated_at
 */
class Example extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['text', 'number', 'email', 'password', 'file', 'date', 'time', 'datetime-local', 'select', 'select2', 'textarea', 'editor', 'created_at', 'updated_at'];
}
