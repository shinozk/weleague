<?php

namespace App\UseCases\Web\Leagues;

use App\Enums\League;
use App\Repositories\NewsRepository;
use App\Repositories\GameRepository;
use Illuminate\Contracts\Database\Eloquent\Builder;

class NewsUseCase
{
    public function invoke(League $league): Builder
    {
        $year = GameRepository::getRecentlyYear($league);
        return NewsRepository::fetchByLeague($league, $year);
    }
}
