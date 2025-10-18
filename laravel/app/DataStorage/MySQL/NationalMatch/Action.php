<?php

namespace App\DataStorage\MySQL\NationalMatch;

use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;

    public function __construct(int $year)
    {
        parent::__construct();
        $this->setTable(sprintf('%s_match_action', $year));
    }

    protected $fillable = [
        'match_id',
        'country_id',
        'player_id',
        'action',
        'time',
    ];
}
