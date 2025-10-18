<?php

namespace App\DataStorage\MySQL\Team;

use Illuminate\Database\Eloquent\SoftDeletes;

class AddName extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'team_id',
        'name',
        'sort',
    ];
}
