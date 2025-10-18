<?php

namespace App\Http\Controllers\Web\Leagues;

use App\Enums\League;
use App\Http\Controllers\Controller;
use App\UseCases\Web\Leagues\NewsUseCase;

class NewsController extends Controller
{
    public function __invoke(League $league, NewsUseCase $useCase)
    {
        $news = $useCase->invoke($league)->paginate(30);
        return view('pages.leagues.news', compact('news', 'league'));
    }
}
