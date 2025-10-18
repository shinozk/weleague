<?php

namespace App\UseCases\Web\Teams;

use App\DataStorage\MySQL\Team\Ranking;
use Illuminate\Support\Collection;

class Detail
{
    /**
    * @param int $team_id
    * @return Collection
    */
    public function invoke(int $team_id): Collection
    {
        return Ranking::select(['year', 'league_id', 'league_name', 'team_name', 'rank', 'matches', 'win', 'draw', 'lose', 'goal', 'against', 'differential', 'point'])
                ->where('team_id', $team_id)
                ->orderBy('year', 'desc')
                ->orderBy('league_id', 'asc')
                ->get()
                ->groupBy('year');
    }
}
