<?php

namespace App\Enums;

enum NewsMode: string
{
    case PLAYER = 'players';
    case TEAM = 'teams';
    case STADIUM = 'stadiums';

    public static function toList(): array
    {
        return array_column(self::cases(), 'value');
    }
}
