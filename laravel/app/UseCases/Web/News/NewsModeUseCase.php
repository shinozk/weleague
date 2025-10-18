<?php

namespace App\UseCases\Web\News;

use App\Enums\NewsMode;
use App\Repositories\NewsRepository;

class NewsModeUseCase
{
    public function __invoke(NewsMode $newsMode, int $id)
    {
        return NewsRepository::fetch($newsMode, $id);
    }
}
