<?php

namespace App\DataStorage\MySQL\Player;

class Name extends Model
{
    protected $fillable = [
        'id',
        'name',
        'player_id',
        'sort',
    ];
}
