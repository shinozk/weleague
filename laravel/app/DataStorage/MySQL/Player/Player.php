<?php

namespace App\DataStorage\MySQL\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function getDisplayNameAttribute(): string
    {
        return is_null($this->english) ? $this->name : sprintf('%s(%s)', $this->name, $this->english);
    }

    public function getInfoAttribute(): string
    {
        if (!$this->weight) {
            return sprintf('国籍：%s', $this->country_name);
        }
        return sprintf('身長：%dcm, 体重：%dkg, 国籍：%s', $this->height, $this->weight, $this->country_name);
    }

    protected static function newFactory()
    {
        return \Database\Factories\PlayerFactory::new();
    }
}
