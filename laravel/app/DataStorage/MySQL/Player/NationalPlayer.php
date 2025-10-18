<?php

namespace App\DataStorage\MySQL\Player;

use Illuminate\Database\Eloquent\SoftDeletes;

class NationalPlayer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'player_id',
        'name',
        'img_url',
        'year',
        'category_id',
    ];
}
