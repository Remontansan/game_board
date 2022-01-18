<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_name',
        'gender',
        'age',
        'favorite_1',
        'content',
    ];
}
