<?php

namespace App\DataStorage\MySQL\National;

use Carbon\Carbon;
use App\Enums\Game\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

class Master extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'category_id',
        'year',
        'home_country_id',
        'away_country_id',
        'home_country_name',
        'away_country_name',
        'title',
        'title_detail',
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
        'started_at',
        'stadium_id',
        'stadium_name',
        'audience',
        'movie_url',
        'status',
        'is_invalid',
        'created_at',
        'updated_at'
    ];

    public function getGameTimeAttribute(): string
    {
        Carbon::setLocale('ja_JP');
        setlocale(LC_ALL, 'ja_JP.UTF-8');
        return Carbon::parse($this->started_at)
            ->isoFormat('YYYY-MM-DD (dd) HH:mm ');
    }


    public function getLabelAttribute(): string
    {
        return sprintf('%s%s %s VS %s', $this->title, $this->title_detail, $this->home_team_name, $this->away_team_name);
    }

    public function getStatusKeyAttribute()
    {
        return Status::from($this->status);
    }

    public function getHomeGoalAttribute(): Collection
    {
        return collect([
                        $this->score1st_home,
                        $this->score2nd_home,
                        $this->score1ex_home,
                        $this->score2ex_home
                ])
                ->filter()
                ->sum();
    }

    public function getAwayGoalAttribute(): Collection
    {
        return collect([
                        $this->score1st_away,
                        $this->score2nd_away,
                        $this->score1ex_away,
                        $this->score2ex_away
                ])
                ->filter()
                ->sum();
    }
}
