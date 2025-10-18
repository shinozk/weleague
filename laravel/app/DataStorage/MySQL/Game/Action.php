<?php

namespace App\DataStorage\MySQL\Game;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Action extends Model
{
    use SoftDeletes;

    protected $table = '%s_actions';

    protected $fillable = [
        'game_id',
        'team_id',
        'player_id',
        'player_name',
        'action',
        'value',
        'time',
        'time_display',
    ];

    public function master(): BelongsTo
    {
        return $this->BelongsTo(Master::class, 'game_id', 'id');
    }
}
