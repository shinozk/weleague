<?php

namespace App\Http\Controllers\Web\News;

use App\Enums\NewsMode;
use App\Http\Controllers\Controller;
use App\UseCases\Web\News\NewsModeUseCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsModeController extends Controller
{
    public function __invoke(NewsMode $newsMode, int $id, NewsModeUseCase $useCase): View | RedirectResponse
    {
        $news = $useCase($newsMode, $id)->paginate(30);
        $name = null;
        if ($news->isEmpty()) {
            return redirect()->route('news.not');
        }
        $firstNews = $news->first();
        $relation = $firstNews->relations->first(fn($value) => $value->this_id === $id
            && $value->mode === $newsMode);
        $name = $relation?->text;

        return view('pages.news.mode', compact('news', 'name', 'newsMode', 'id'));
    }
}
