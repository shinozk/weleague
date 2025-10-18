<?php

namespace App\DataStorage\MySQL\Game;

use App\DataStorage\MySQL\Team\History;
use Carbon\Carbon;
use App\Enums\Game\Status;
use Illuminate\Database\Eloquent\SoftDeletes;

class Master extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'league_id',
        'year',
        'leagure_name',
        'home_team_id',
        'away_team_id',
        'home_team_name',
        'away_team_name',
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
    ];

    protected function getGameTimeAttribute()
    {
        Carbon::setLocale('ja_JP');
        setlocale(LC_ALL, 'ja_JP.UTF-8');
        return Carbon::parse($this->started_at)
            ->isoFormat('YYYY-MM-DD (dd) HH:mm ');
    }


    protected function getLabelAttribute()
    {
        return sprintf('%s%s %s VS %s', $this->title, $this->title_detail, $this->home_team_name, $this->away_team_name);
    }

    protected function getStatusKeyAttribute()
    {
        $status = Status::from($this->status);
        return $status->description();
    }

    protected function getHomeGoalAttribute()
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

    protected function getAwayGoalAttribute()
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

    protected function getHomeTeamImageAttribute(): string
    {
        return History::select('img_url')
            ->where('year', substr($this->id, 0, 4))
            ->where('team_id', $this->home_team_id)
            ->first()
            ->img_url;
    }

    protected function getAwayTeamImageAttribute(): string
    {
        return History::select('img_url')
            ->where('year', substr($this->id, 0, 4))
            ->where('team_id', $this->away_team_id)
            ->first()
            ->img_url;
    }
}
