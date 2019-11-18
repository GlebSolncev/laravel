<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected
        $table = 'videos',
        $primaryKey = 'id',
        $dates = ['created_at', 'updated_at'],
        $fillable = [
            'id',
            'src',
            'name',
            'content',
            'status',
            'premium'
        ];

    public $timestamps = true;
}
