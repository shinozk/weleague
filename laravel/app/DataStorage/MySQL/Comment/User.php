<?php

namespace App\DataStorage\MySQL\Comment;

class User extends Model
{
    protected $fillable = [
        'user_agent',
        'ip',
        'code'
    ];
}
