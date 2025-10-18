<?php

namespace App\DataStorage\MySQL\National;

use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $table = '%s_members';

    protected $fillable = [
        'game_id',
        'country_id',
        'player_id',
        'player_name',
        'uniform_number',
        'type',
        'position',
    ];
}
