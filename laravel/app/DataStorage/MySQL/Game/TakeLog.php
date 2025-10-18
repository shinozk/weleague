<?php

namespace App\DataStorage\MySQL\Game;

class TakeLog extends Model
{
    protected $fillable = [
        'league_id',
        'no',
        'year'
    ];
}
