<?php

namespace App\Repositories;

use App\DataStorage\MySQL\Team\Team;
use App\DataStorage\MySQL\Team\History;
use App\DataStorage\MySQL\Team\Name;

class TeamRepository
{
    public static function get(int $id): ?Team
    {
        return Team::find($id);
    }


    public static function getLog(int $id, int $year): ?History
    {
        return History::select(['team_id', 'name', 'english', 'hometown', 'img_url'])
            ->where('team_id', $id)
            ->where('year', $year)
            ->first();
    }


    public static function searchByName(string $name): array
    {
        try {
            $names = Name::select(['team_id'])
                            ->where('name', $name)
                            ->get();
            if ($names->isEmpty()) {
                return [];
            }

            return $names
                    ->pluck('team_id')
                    ->toArray();
        } catch (\Throwable $t) {
            print_r($t->getMessage());
        }
        return [];
    }
}
