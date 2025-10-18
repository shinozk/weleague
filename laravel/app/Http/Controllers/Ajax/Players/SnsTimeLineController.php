<?php

namespace App\Http\Controllers\Ajax\Players;

use App\Http\Controllers\Controller;
use App\Repositories\PlayerRepository as Repository;
use App\DataStorage\MySQL\Player\Player;

class SnsTimeLineController extends Controller
{
    public function __invoke(Player $player)
    {
        $ret = Repository::getSNSAccount($player->id);
        return $ret;
        ## TODO JsonResourceで連想配列にして返したい
        return response()->json(['data' => $ret], 200);
    }
}
