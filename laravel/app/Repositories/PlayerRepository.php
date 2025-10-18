<?php

namespace App\Repositories;

use App\DataStorage\MySQL\Player\Player;
use App\DataStorage\MySQL\Player\Name;
use App\DataStorage\MySQL\Player\SnsAccount;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PlayerRepository
{
    public static function fetch(?string $name): Builder
    {
        return Player::when(
            $name,
            fn ($query) =>
                $query->where('name', 'like', '%' . addslashes($name) . '%')
                      ->orWhere('english', addslashes($name))
        );
    }

    public static function getPlayer(int $id): ?Player
    {
        return Player::find($id);
    }

    public static function getPlayerByBirthday(Carbon $today): Builder
    {
        return Player::select(['id', 'name', 'english'])
            ->whereMonth('birthday', $today->month)
            ->whereDay('birthday', $today->day);
    }

    public static function searchByName(string $name): array
    {
        try {
            return Name::select(['player_id'])
                ->where('name', $name)
                ->get()
                ->pluck('player_id')
                ->toArray();
        } catch (\Throwable $t) {
            return [];
        }
    }

    public static function getSNSAccount(int $player_id): Collection
    {
        return SnsAccount::select(['sns', 'code'])
            ->where('player_id', $player_id)
            ->get();
    }
}
