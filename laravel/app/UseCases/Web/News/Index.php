<?php

namespace App\UseCases\Web\News;

use App\Repositories\NewsRepository;

class Index
{
    public function __invoke()
    {
        return NewsRepository::fetch();
    }
}
