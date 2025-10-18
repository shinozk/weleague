<?php

namespace App\Enums\Game;

enum Status: Int
{
    case Before = 1;
    case InProgress = 2;
    case Cancelled = 3;
    case After = 4;


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public function description(): string
    {
        return match ($this) {
            Status::Before => '非公開',
            Status::InProgress => '試合中',
            Status::Cancelled => '試合中止',
            Status::After => '試合終了',
        };
    }
}
