<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ajax\News as Request;
use App\UseCases\Ajax\News as UseCase;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsController extends Controller
{
    public function __invoke(Request $request, UseCase $useCase)
    {
        $data = $request->validated();
        $news = $useCase->invoke($data);
        return new JsonResource($news);
    }
}
