<?php

namespace App\Http\Controllers\Web\News;

use App\Http\Controllers\Controller;
use App\UseCases\Web\News\Index as UseCase;

class IndexController extends Controller
{
    public function __invoke(UseCase $useCase)
    {
        $news = $useCase()->paginate(30);
        return view('pages.news.index', compact('news'));
    }
}
