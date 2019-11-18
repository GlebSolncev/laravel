<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected
        $table = 'roles',
        $primaryKey = 'id',
        $fillable = ['name', 'title'];

}
