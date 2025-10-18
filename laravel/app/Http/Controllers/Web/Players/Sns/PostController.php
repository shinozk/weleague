<?php

namespace App\Http\Controllers\Web\Players\Sns;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Players\Sns\Post as Request;
use App\UseCases\Web\Players\Sns\Post as UseCase;
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

        return redirect('/players/' . $request->player_id);
    }
}
