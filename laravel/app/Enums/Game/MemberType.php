<?php

namespace App\Enums\Game;

/**
 * @method Start = 1
 * @method Sub = 2
 */
enum MemberType: int
{
    case Start = 1;
    case Sub = 2;

    public function description(): string
    {
        return match ($this) {
            self::Start => '先発',
            self::Sub => 'リサーブ',
        };
    }
}
