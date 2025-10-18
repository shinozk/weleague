<?php

namespace App\DataStorage\MySQL\News;

use App\Enums\NewsMode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'news_id',
        'mode',
        'this_id',
        'text',
    ];

    protected $casts = [
        'mode' => NewsMode::class,
    ];

    public function news(): HasOne
    {
        return $this->hasOne(News::class);
    }

    protected static function newFactory(): Factory
    {
        return \Database\Factories\RelationFactory::new();
    }
}
