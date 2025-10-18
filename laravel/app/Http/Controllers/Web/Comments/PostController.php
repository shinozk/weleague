<?php

namespace App\Http\Controllers\Web\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Comments\Post as Request;
use App\UseCases\Web\Comments\Post as UseCase;
use App\Utils\Capture as Util;

class PostController extends Controller
{
    public function __invoke(Request $request, UseCase $useCase)
    {
        if (!Util::isSuccessed($request['g-recaptcha-response'])) {
            return back()->withErrors('認証されませんでした');
        }

        $records = $request->makeModel();
        if (!$records) {
            return back()->withErrors('保存する内容がありません');
        }

        $useCase->invoke($records);

        $url = sprintf('comments/%s/%s', $request->mode, $request->relation_id);
        return redirect($url);
    }
}
