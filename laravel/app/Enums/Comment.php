<?php

namespace App\Enums;

use App\DataStorage\MySQL\Player\Player as PlayerDB;
use App\DataStorage\MySQL\Team\Team as TeamDB;
use App\DataStorage\MySQL\Game\Master as GameDB;

use App\DataStorage\MySQL\Comment\Game as GameComment;
use App\DataStorage\MySQL\Comment\Player as PlayerComment;
use App\DataStorage\MySQL\Comment\Team as TeamComment;

enum Comment: string
{
    case Players = 'players';
    case Teams = 'teams';
    case Games = 'games';

    public function getEntity(): PlayerDB | TeamDB | GameDB
    {
        return match ($this) {
            self::Players => new PlayerDB(),
            self::Teams => new TeamDB(),
            self::Games => new GameDB(),
        };
    }

    public function getCommentEntity(): PlayerComment | TeamComment | GameComment
    {
        return match ($this) {
            self::Players => new PlayerComment(),
            self::Teams => new TeamComment(),
            self::Games => new GameComment(),
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
