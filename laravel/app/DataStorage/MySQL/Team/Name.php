<?php

namespace App\DataStorage\MySQL\Team;

class Name extends Model
{
    protected $fillable = [
        'id',
        'name',
        'team_id',
        'sort',
    ];
}
