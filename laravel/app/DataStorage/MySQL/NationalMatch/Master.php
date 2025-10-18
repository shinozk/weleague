<?php

namespace App\DataStorage\MySQL\NationalMatch;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Master extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'category_id',
        'home_country_id',
        'away_country_id',
        'home_country_name',
        'away_country_name',
        'match_title',
        'match_typeName',
        'result',
        'score1st_home',
        'score1st_away',
        'score2nd_home',
        'score2nd_away',
        'score1ex_home',
        'score1ex_away',
        'score2ex_home',
        'score2ex_away',
        'scorePK_home',
        'scorePK_away',
        'match_date',
        'stadium_id',
        'audience',
        'movie_url',
        'status',
        'is_invalid',
    ];

    public function getMatchTimeAttribute(): string
    {
        Carbon::setLocale('ja_JP');
        setlocale(LC_ALL, 'ja_JP.UTF-8');
        return Carbon::parse($this->match_date)
            ->isoFormat('YYYY-MM-DD HH:mm (dd)');
    }
}
