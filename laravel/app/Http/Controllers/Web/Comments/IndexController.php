<?php

namespace App\Http\Controllers\Web\Comments;

use App\Enums\Comment;
use App\Http\Controllers\Controller;
use App\UseCases\Web\Comments\Index as UseCase;
use Illuminate\View\View as ViewView;

class IndexController extends Controller
{
    public function __invoke(Comment $mode, int $id, UseCase $useCase): ViewView
    {
        $dto = $useCase->invoke($mode, $id);
        $list = $dto->builder->paginate(50);
        $model = $dto->model;
        return view('pages.comments.index', compact('id', 'mode', 'list', 'model'));
    }
}
