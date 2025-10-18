<?php

namespace App\UseCases\Ajax\Games;

use App\DataStorage\MySQL\Game\Master;
use App\Enums\Game\Status;
use App\Models\Ajax\Games\Index as Model;

class Index
{
    public function invoke(Model $model)
    {
        return Master::where('year', $model->year)
            ->when(
                $model->mode === 'players',
                fn($query) =>
                $query->whereIn(
                    'id',
                    fn($table) =>
                    $table->select('game_id')
                        ->from(sprintf('%s_actions', $model->year))
                        ->where('player_id', $model->id)
                        ->when($model->action, fn($q) => $q->where('action', $model->action))
                )
            )
            ->when(
                $model->mode === 'leagues',
                fn($ret) =>
                $ret->where('league_id', $model->id)
                    ->where('status', Status::After)
                    ->orderBy('started_at', 'desc')
            );
    }
}
