<?php

namespace App\UseCases\Ajax;

use App\Enums\NewsMode;
use App\Repositories\NewsRepository;
use Illuminate\Database\Eloquent\Collection;

class News
{
    public function invoke(array $data): Collection
    {
        return NewsRepository::fetch(NewsMode::tryFrom($data['mode'] ?? null), $data['id'] ?? null, $data['limit'] ?? 5, $data['page'] ?? 1)->get();
    }
}
