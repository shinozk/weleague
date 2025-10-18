<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\DataStorage\MySQL\Team\History;

class HistoryRepository
{
    public static function getIcons(int $year): Collection
    {
        return History::select(['team_id', 'img_url'])
                ->where('year', $year)
                ->get()
                ->pluck('img_url', 'team_id');
    }
}
