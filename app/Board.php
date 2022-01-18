<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'game_name',
        'deadline',
        'content',
        'user_name',
        'user_id',
    ];
}
