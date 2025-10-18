<?php

namespace App\DataStorage\MySQL\Setting;

use Illuminate\Database\Eloquent\SoftDeletes;

class Name extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'country_id',
    ];
}
