<?php

namespace App\DataStorage\MySQL\Comment;

class Game extends Model
{
    protected $fillable = [
        'user_id',
        'relation_id',
        'ip',
        'user_agent',
        'body',
    ];

    public function getCodeAttribute(): string
    {
        return md5(sprintf('%s::%s', $this->user_agent, $this->ip));
    }
}
