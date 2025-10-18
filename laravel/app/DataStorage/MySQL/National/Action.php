<?php

namespace App\DataStorage\MySQL\National;

use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;

    protected $table = '%s_actions';

    protected $fillable = [
        'game_id',
        'country_id',
        'player_id',
        'player_name',
        'action',
        'value',
        'time',
        'time_display',
    ];
}
