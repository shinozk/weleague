<?php

namespace App\Http\Controllers\Ajax\Players;

use App\DataStorage\MySQL\Player\Player;
use App\Http\Controllers\Controller;
use App\UseCases\Ajax\Players\Belong as UseCase;

class BelongController extends Controller
{
    public function __invoke(Player $player, UseCase $useCase)
    {
        $belongs = $useCase->invoke($player);

        ## TODO JsonResourceで連想配列にして返したい
        return response()->json(['data' => $belongs], 200);
    }
}
