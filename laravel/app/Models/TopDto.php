<?php

namespace App\Models;

use App\DataStorage\MySQL\News\News;
use Illuminate\Database\Eloquent\Collection;

class TopDto
{
    public readonly Collection $games;
    public readonly News $topNews;
    public readonly Collection $news;
    public readonly Collection $players;

    public function __construct(Collection $game, Collection $news, Collection $players)
    {
        $this->games = $game;
        $this->topNews = $news->first();
        $this->news = $news->skip(1);
        $this->players = $players;
    }

    public static function make(Collection $game, Collection $news, Collection $players): TopDto
    {
        return new self($game, $news, $players);
    }
}
