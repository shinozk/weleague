<?php

namespace App\DataStorage\MySQL\Stadium;

class Name extends Model
{
    protected $fillable = [
        'id',
        'name',
        'stadium_id',
        'sort',
    ];
}
