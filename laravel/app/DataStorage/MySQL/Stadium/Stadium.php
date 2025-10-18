<?php

namespace App\DataStorage\MySQL\Stadium;

use Illuminate\Database\Eloquent\SoftDeletes;

class Stadium extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'englished',
        'address',
        'lat',
        'lng',
        'capacity',
        'established',
        'size',
    ];
}
