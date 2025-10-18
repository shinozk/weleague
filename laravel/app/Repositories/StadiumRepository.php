<?php

namespace App\Repositories;

use App\DataStorage\MySQL\Stadium\Stadium;
use App\DataStorage\MySQL\Stadium\Name;

class StadiumRepository
{
    public static function get(int $id): ?Stadium
    {
        try {
            return Stadium::findOrFail($id);
        } catch (\Throwable $t) {
            return null;
        }
    }


    public static function searchByName(string $name): array
    {
        try {
            return Name::select(['stadium_id'])
                            ->where('name', $name)
                            ->get()
                            ->pluck('stadium_id')
                            ->toArray();
        } catch (\Throwable $t) {
            return [];
        }
    }
}
