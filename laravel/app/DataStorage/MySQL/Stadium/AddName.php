<?php

namespace App\DataStorage\MySQL\Stadium;

use Illuminate\Database\Eloquent\SoftDeletes;

class AddName extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'stadium_id',
        'name',
        'sort',
    ];
}
