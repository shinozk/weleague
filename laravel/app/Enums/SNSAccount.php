<?php

namespace App\Enums;

enum SNSAccount: int
{
    case Twitter = 0;
    case Instagram = 1;
    case YouTube = 2;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
