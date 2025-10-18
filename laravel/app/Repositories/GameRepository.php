<?php

namespace App\Repositories;

use App\DataStorage\MySQL\Game\Action;
use App\DataStorage\MySQL\Game\Master;
use App\Enums\Game\Status;
use App\Enums\League;
use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder;

class GameRepository
{
    public static function get(int $id): ?Master
    {
        return Master::find($id);
    }


    public static function getTop(): Collection
    {
        return
            Master::select([
                'id',
                'league_id',
                'home_team_id',
                'home_team_name',
                'away_team_id',
                'away_team_name',
                'score1st_home',
                'score1st_away',
                'score2nd_home',
                'score2nd_away',
                'score1ex_home',
                'score1ex_away',
                'score2ex_home',
                'score2ex_away',
                'title',
                'title_detail',
                'result',
                'started_at',
                'stadium_name',
                'audience',
                'status'
            ])
            ->where('status', Status::After)
            ->limit(30)
            ->orderByDesc('started_at')
            ->get();
        //            ->groupBy('title');
    }

    public static function getRecentlyYear(League $league): int
    {
        return
            Master::select([
                'league_id',
                'year'
            ])
            ->whereIn('league_id', $league->leagueIds())
            ->orderByDesc('year')
            ->first()
            ->year;
    }

    public static function fetchLeagueGoalPlayer(League $league, int $year): Collection
    {
        $table = new Action();
        $table->setYear($year);
        return $table->select(['player_id', 'player_name'])
            ->selectRaw('count(action = "Goal" or null ) as goal_count')
            ->whereHas('master', fn(Builder $q) => $q->whereIn('league_id', $league->leagueIds()))
            ->groupBy(['player_id', 'player_name'])
            ->orderByDesc('goal_count')
            ->limit(10)
            ->get();
    }

    public static function fetchLeagueMatch(League $league): Collection
    {
        return
            Master::select([
                'id',
                'league_id',
                'home_team_id',
                'home_team_name',
                'away_team_id',
                'away_team_name',
                'score1st_home',
                'score1st_away',
                'score2nd_home',
                'score2nd_away',
                'score1ex_home',
                'score1ex_away',
                'score2ex_home',
                'score2ex_away',
                'title',
                'title_detail',
                'result',
                'started_at',
                'stadium_name',
                'audience',
                'status'
            ])
            ->where('status', Status::After)
            ->whereIn('league_id', $league->leagueIds())
            ->limit(30)
            ->orderByDesc('started_at')
            ->get();
    }
}
