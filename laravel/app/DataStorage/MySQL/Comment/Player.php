<?php

namespace App\DataStorage\MySQL\Comment;

use Carbon\Carbon;

class Player extends Model
{
    protected $fillable = [
        'user_id',
        'relation_id',
        'ip',
        'user_agent',
        'body',
        'created_at'
    ];

    public function getCodeAttribute()
    {
        return md5(sprintf('%s::%s', $this->user_agent, $this->ip));
    }

    public function getDisplayCreatedAtAttribute()
    {
        $carbon = new Carbon($this->created_at);
        return $carbon->format('Y/m/d H:i:s');
    }
}
