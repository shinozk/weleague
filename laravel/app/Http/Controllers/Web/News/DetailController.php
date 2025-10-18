<?php

namespace App\Http\Controllers\Web\News;

use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;

class DetailController extends Controller
{
    public function __invoke(int $id, NewsRepository $repository)
    {
        $news = $repository::get($id);
        return view('pages.news.detail', compact('news'));
    }
}
