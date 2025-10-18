<?php

namespace App\Http\Controllers\Web\Games;

use App\Http\Controllers\Controller;
use App\UseCases\Web\Games\Detail as UseCase;
use App\Utils\TeamPlayers;

class DetailController extends Controller
{
    public function __invoke(int $id, UseCase $useCase)
    {
        $game = $useCase->get($id);
        $actions = $useCase->getActions($id);

        $members = $useCase->getMembers($id);
        $members_home = TeamPlayers::sortMemberList($members[$game->home_team_id]);
        $members_away = TeamPlayers::sortMemberList($members[$game->away_team_id]);

        $icons = $useCase->getIcons($id, $game->home_team_id, $game->away_team_id);
        return view('pages.games.detail', compact(
            'game',
            'actions',
            'members_home',
            'members_away',
            'icons'
        ));
    }
}
