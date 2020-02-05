<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Array of fillable database column
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'content'
    ];
}
