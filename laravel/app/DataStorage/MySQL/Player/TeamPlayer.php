<?php

namespace App\DataStorage\MySQL\Player;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamPlayer extends Model
{
    use SoftDeletes;

    protected $table = '%d_team_players';

    protected $fillable = [
        'team_id',
        'team_name',
        'player_id',
        'player_name',
        'uniform_number',
        'position',
        'height',
        'weight',
        'start_month',
        'end_month',
        'photo'
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

//    protected static function newFactory()
//    {
//        return \Database\Factories\TeamFactory::new();
//    }
}
