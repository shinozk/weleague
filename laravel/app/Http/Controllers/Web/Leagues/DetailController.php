<?php

namespace App\Http\Controllers\Web\Leagues;

use App\Enums\League;
use App\Http\Controllers\Controller;
use App\UseCases\Web\Leagues\Detail as UseCase;

class DetailController extends Controller
{
    public function __invoke(League $league, UseCase $useCase)
    {
        $top = $useCase->invoke($league);
        return view('pages.leagues.detail', compact('top', 'league'));
    }
}
