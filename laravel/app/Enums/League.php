<?php

namespace App\Enums;

use App\DataStorage\MySQL\Team\Ranking;

enum League: string
{
    case WeLeague = 'weleague';
    case Nadeshiko1 = 'nadeshiko1';
    case Nadeshiko2 = 'nadeshiko2';
    case Challenge = 'challenge';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match($this) {
            self::WeLeague => '.WEリーグ',
            self::Nadeshiko1 => 'なでしこ1部リーグ',
            self::Nadeshiko2 => 'なでしこ2部リーグ',
            self::Challenge => 'チャレンジリーグ',
        };
    }

    public function leagueIds(): array
    {
        return match($this) {
            self::WeLeague => [18, 19, 20, 21, 22, 23],
            self::Nadeshiko1 => [1, 3, 4, 7],
            self::Nadeshiko2 => [2, 5, 6, 8],
            default => [9, 10, 11, 12, 13, 14, 15, 16, 17]
        };
    }

    public function teamIds(int $year): array
    {
        if ($this === self::WeLeague) {
            $year = 2024;
        }
        return Ranking::select(['team_id'])
            ->where('year', $year)
            ->whereIn('league_id', $this->leagueIds())
            ->get()
            ->pluck('team_id')
            ->toArray();
    }
}
