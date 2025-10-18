<?php

namespace App\DataStorage\MySQL\Game;

use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $table = '%s_members';

    protected $fillable = [
        'game_id',
        'team_id',
        'player_id',
        'name',
        'uniform_number',
        'position',
        'type',
    ];
}
