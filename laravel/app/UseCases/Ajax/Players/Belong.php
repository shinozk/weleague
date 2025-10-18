<?php

namespace App\UseCases\Ajax\Players;

use App\DataStorage\MySQL\Player\Player;
use App\DataStorage\MySQL\Player\TeamPlayer;
use App\DataStorage\MySQL\Game\Action;
use App\DataStorage\MySQL\Player\NationalPlayer;
use Illuminate\Database\Eloquent\Collection;

class Belong
{
    public function invoke(Player $player): array
    {
        $startYear = config('site.start_year');
        $year = config('site.year');

        $nationals = $this->getNationalPlayer($player->id);
        $results = [];
        for ($i = $year; $i >= $startYear; $i--) {
            $belongTeam = $this->getTeamPlayer($player->id, $i);
            if ($belongTeam->isEmpty()) {
                continue;
            }

            $statsByTeam = $this->getMatchBelong($player->id, $i);
            foreach ($belongTeam as $belong) {
                $stats = $statsByTeam[$belong->team_id] ?? collect([]);
                $results[$i]['teams'][] = ['stats' => $stats->toArray(), 'belongs' => $belong->toArray()];
            }

            if (!isset($nationals[$i])) {
                continue;
            }
        }

        foreach ($nationals as $year => $nationalYear) {
            foreach ($nationalYear as $national) {
                $results[$year]['nationals'][] = [
                    'category_id' => $national->category_id,
                    'img_url' => $national->img_url
                ];
            }
        }

        return $results;
    }

    /**
     * @param  int $id
     * @param  int $year
     * @return Collection<int, Action>
     */
    private function getMatchBelong(int $id, int $year): Collection
    {
        $actionDB = new Action();
        $actionDB->setYear($year);
        return $actionDB->selectRaw(
            'count(action= "Start" or null) as start, ' .
                'count(action= "Sub" or null) as sub, ' .
                'count(action= "Goal" or null) as goal, ' .
                'count(action= "In"   or null) as "in", ' .
                'count(action= "Out"   or null) as "out", ' .
                'count(action= "Yellow" or null) as yellow, ' .
                'count(action= "Red" or null) as red'
        )
            ->addSelect('team_id')
            ->where('player_id', $id)
            ->groupBy('team_id')
            ->get()
            ->keyBy('team_id');
    }

    /**
     * @param  int $id
     * @param  int $year
     * @return Collection<TeamPlayer>
     */
    private function getTeamPlayer(int $id, int $year): Collection
    {
        $teamPlayer = new TeamPlayer();
        $teamPlayer->setYear($year);
        return $teamPlayer
            ->select(['uniform_number', 'position', 'team_id', 'team_name', 'photo', 'player_name'])
            ->where('player_id', $id)
            ->get();
    }

    /**
     * @param  int $id
     * @return Collection<int, NationalPlayer>
     */
    private function getNationalPlayer(int $id): Collection
    {
        return NationalPlayer::select(['year', 'category_id', 'img_url'])
            ->where('player_id', $id)
            ->get()
            ->groupBy('year');
    }
}
