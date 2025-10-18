<?php

namespace App\UseCases\Web\Games;

use App\DataStorage\MySQL\Game\Action;
use App\DataStorage\MySQL\Game\Member;
use App\DataStorage\MySQL\Game\Master;
use App\DataStorage\MySQL\Team\History;
use App\Enums\Game\Action as Enum;
use Illuminate\Support\Collection;

class Detail
{
    public function get(int $id): ?Master
    {
        try {
            return Master::findOrFail($id);
        } catch (\Throwable $t) {
            return null;
        }
    }

    public function getActions(int $id): ?Collection
    {
        $year = substr($id, 0, 4);
        try {
            $table = new Action();
            $table->setYear($year);
            return $table
                    ->select(['team_id', 'player_id', 'player_name', 'action', 'time', 'time_display'])
                    ->where('game_id', $id)
                    ->whereNotIn('action', [Enum::Start, Enum::Sub])
                    ->orderBy('time')
                    ->get()
                    ->groupBy([
                        fn ($item) => Enum::from($item->action)->actionType(),
                        'team_id',
                    ]);
        } catch (\Throwable $t) {
            return null;
        }
    }

    public function getMembers(int $id): Collection
    {
        $year = substr($id, 0, 4);
        try {
            $table = new Member();
            $table->setYear($year);
            $ret = $table
                ->select(['team_id', 'player_id', 'player_name', 'uniform_number', 'position', 'type'])
                ->where('game_id', $id)
                ->get()
                ->groupBy('team_id');
            return $ret;
        } catch (\Throwable $t) {
            return null;
        }
    }

    public function getIcons(int $id, int $home_team_id, int $away_team_id)
    {
        $year = substr($id, 0, 4);
        return History::select(['team_id', 'img_url'])
                ->whereIn('team_id', [$home_team_id, $away_team_id])
                ->where('year', $year)
                ->get()
                ->pluck('img_url', 'team_id');
    }
}
