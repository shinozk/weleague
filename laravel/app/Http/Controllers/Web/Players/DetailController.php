<?php

namespace App\Http\Controllers\Web\Players;

use App\Http\Controllers\Controller;
use App\DataStorage\MySQL\Player\Player;

class DetailController extends Controller
{
    public function __invoke(Player $player)
    {
        if (!$player) {
            abort(404);
        }
        return view('pages.players.detail', compact('player'));
    }
}
