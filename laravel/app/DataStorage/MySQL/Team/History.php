<?php

namespace App\DataStorage\MySQL\Team;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function newFactory(): Factory
    {
        return \Database\Factories\HistoryFactory::new();
    }
}
