<?php

namespace App\DataStorage\MySQL\News;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'body',
        'img_url',
        'md5',
        'url',
        'open_date'
    ];

    public function relations(): HasMany
    {
        return $this->hasMany(Relation::class);
    }

    protected static function newFactory(): Factory
    {
        return \Database\Factories\NewsFactory::new();
    }
}
