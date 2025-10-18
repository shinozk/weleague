<?php

namespace App\Enums\Game;

enum Action: string
{
    case Start = 'Start';
    case Sub = 'Sub';
    case In = 'In';
    case Out = 'Out';
    case Yellow = 'Yellow';
    case Red = 'Red';
    case Goal = 'Goal';

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
            Action::Start => '先発',
            Action::Sub => 'リサーブ',
            Action::In => '途中出場',
            Action::Out => '途中交代',
            Action::Yellow=> '警告',
            Action::Red => '退場',
            Action::Goal => '得点'
        };
    }

    public function actionType(): string
    {
        return match ($this) {
            Action::Start => 'Start',
            Action::Sub => 'Sub',
            Action::In  => 'In',
            Action::Out => 'In',
            Action::Yellow => 'Card',
            Action::Red => 'Card',
            Action::Goal => 'Goal',
        };
    }
}
