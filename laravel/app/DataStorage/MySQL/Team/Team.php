<?php

namespace App\DataStorage\MySQL\Team;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function newFactory(): Factory
    {
        return \Database\Factories\TeamFactory::new();
    }

    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }

    public function leagues($year): HasMany
    {
        return $this->hasMany(Ranking::class)->where('year', $year);
    }

    public function historieYear(int $year): HasMany
    {
        return $this->hasMany(History::class)->where('year', $year);
    }
}
