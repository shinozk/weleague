<?php

namespace App\DataStorage\MySQL\Setting;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function newFactory(): Factory
    {
        return \Database\Factories\CountryFactory::new();
    }
}
