<?php

namespace App\UseCases\Web\Players\Sns;

use App\DataStorage\MySQL\Player\SnsAccount;

class Index
{
    public function invoke()
    {
        return SnsAccount::selectRaw('GROUP_CONCAT(sns) as sns, GROUP_CONCAT(code) as codes')
                        ->addSelect(['player_id', 'name'])
                        ->join('players', 'player_id', 'players.id')
                        ->groupBY('player_id');
    }
}
