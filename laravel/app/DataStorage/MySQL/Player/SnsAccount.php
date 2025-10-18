<?php

namespace App\DataStorage\MySQL\Player;

class SnsAccount extends Model
{
    protected $fillable = [
        'sns',
        'code',
        'player_id'
    ];
}
