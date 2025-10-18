<?php

namespace App\DataStorage\MySQL\Team;

use Illuminate\Database\Eloquent\SoftDeletes;

class Ranking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'league_id',
        'league_name',
        'year',
        'team_id',
        'team_name',
        'rank',
        'matches',
        'win',
        'draw',
        'lose',
        'goal',
        'against',
        'differential',
        'point'
    ];
}
