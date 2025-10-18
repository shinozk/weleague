<?php

namespace App\Http\Controllers\Web\Players\Sns;

use App\Http\Controllers\Controller;
use App\DataStorage\MySQL\Player\Player;
use App\Repositories\PlayerRepository as Repository;

class RegisterController extends Controller
{
    public function __invoke(Player $player)
    {
        $player = $player;
        if (!$player) {
            abort(404);
        }

        $sns = Repository::getSNSAccount($player->id);
        if ($sns) {
            $sns = $sns->pluck('code', 'sns');
        }

        return view('pages.players.sns.register', compact('player', 'sns'));
    }
}
