<?php

namespace App\Http\Controllers\Web\Teams;

use App\Http\Controllers\Controller;
use App\DataStorage\MySQL\Team\Team;
use App\UseCases\Web\Teams\Players as UseCase;
use Illuminate\Database\Eloquent\Builder;

class PlayersController extends Controller
{
    public function __invoke(Team $team, int $year, UseCase $useCase)
    {
        $teamPlayer = $useCase->getTeamPlayers($team->id, $year);
        if (!$teamPlayer) {
            abort(404);
        }
        $imgUrl = $team->historieYear($year)->select(['img_url'])->first()->img_url;
        return view('pages.teams.players', compact(
            'year',
            'team',
            'teamPlayer',
            'imgUrl'
        ));
    }
}
