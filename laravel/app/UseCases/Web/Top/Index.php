<?php

namespace App\UseCases\Web\Top;

use App\Models\TopDto;
use App\Repositories\GameRepository;
use App\Repositories\NewsRepository;
use App\Repositories\PlayerRepository;
use Carbon\Carbon;

class Index
{
    public function invoke(): TopDto
    {
        $players = PlayerRepository::getPlayerByBirthday(Carbon::today())->limit(10)->get();
        $news = NewsRepository::fetch(null, null, 4)->get();
        $games = GameRepository::getTop();
        return TopDto::make($games, $news, $players);
    }
}
