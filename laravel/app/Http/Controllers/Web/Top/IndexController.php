<?php

namespace App\Http\Controllers\Web\Top;

use App\Http\Controllers\Controller;
use App\UseCases\Web\Top\Index as UseCase;

class IndexController extends Controller
{
    public function __invoke(UseCase $useCase)
    {
        $top = $useCase->invoke();
        return view('pages.top', compact('top'));
    }
}
