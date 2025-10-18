<?php

namespace App\Http\Controllers\Web\Teams;

use App\DataStorage\MySQL\Team\Team;
use App\Http\Controllers\Controller;
use App\UseCases\Web\Teams\Detail;

class DetailController extends Controller
{
    public function __invoke(Team $team, Detail $useCase)
    {
        $rankings = $useCase->invoke($team->id);
        return view('pages.teams.detail', compact('team', 'rankings'));
    }
}
