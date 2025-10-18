<?php

namespace App\UseCases\Web\Leagues;

use App\Enums\League;
use App\Models\TopDto;
use App\Repositories\GameRepository;
use App\Repositories\NewsRepository;

class Detail
{
    public function invoke(League $league): TopDto
    {
        $year = GameRepository::getRecentlyYear($league);
        $players = GameRepository::fetchLeagueGoalPlayer($league, $year);
        $news = NewsRepository::fetchByLeague($league, $year)
            ->limit(4)
            ->get();
        $games = GameRepository::fetchLeagueMatch($league);
        return TopDto::make($games, $news, $players);
    }
}
