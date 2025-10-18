<?php

namespace App\UseCases\Web\Teams;

use App\DataStorage\MySQL\Player\TeamPlayer;
use App\Utils\TeamPlayers as Utils;
use Illuminate\Support\Collection;

class Players
{
    /**
    * @param int $team_id
    * @param int $year
    * @return Collection
    */
    public function getTeamPlayers(int $teamId, int $year): Collection
    {
        $db = new TeamPlayer();
        $db->setYear($year);
        $ret = $db
                ->where('team_id', $teamId)
                ->with('player:id,birthday')
                ->get();
        if ($ret->isEmpty()) {
            return Collect([]);
        }

        return Utils::sortMemberList($ret);
    }
}
