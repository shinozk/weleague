<?php

namespace App\DataStorage\MySQL\Player;

use Illuminate\Database\Eloquent\SoftDeletes;

class AddName extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'player_id',
        'name',
        'sort',
    ];
}
