<?php

namespace App\UseCases\Ajax\Teams;

use App\DataStorage\MySQL\Team\Ranking as RankingDB;
use App\Models\Ajax\Teams\Ranking as Model;

class Ranking
{
    public function invoke(Model $model)
    {
        return RankingDB::select([
                                'league_name', 'team_name', 'team_id',
                                'rank', 'matches', 'win', 'draw', 'lose',
                                'goal', 'against', 'differential', 'point'])
                    ->where('year', $model->year)
                    ->where('league_id', $model->id)
                    ->orderBy('rank')
                    ->get();
    }
}
