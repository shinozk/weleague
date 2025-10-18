<?php

namespace App\UseCases\Ajax\Teams;

use App\DataStorage\MySQL\Team\History;
use Illuminate\Support\Collection;

class SelectYear
{
    public function invoke(Int $id): Collection
    {
        return History::select(['year'])
                            ->where('team_id', $id)
                            ->orderBy('year', 'desc')
                            ->get()
                            ->pluck('year');
    }
}
