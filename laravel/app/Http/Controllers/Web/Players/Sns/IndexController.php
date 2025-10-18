<?php

namespace App\Http\Controllers\Web\Players\Sns;

use App\Http\Controllers\Controller;
use App\UseCases\Web\Players\Sns\Index as UseCase;

class IndexController extends Controller
{
    public function __invoke(UseCase $useCase)
    {
        $paginate = $useCase->invoke()->paginate(50);
        $list = $paginate->map(function ($item, $key) {
            $snss = explode(',', $item->sns);
            $codes = explode(',', $item->codes);
            $tmp = [];
            foreach ($snss as $i => $sns) {
                $tmp[$sns] = $codes[$i];
            }
            $item->sns = $tmp;
            return $item;
        });
        return view('pages.players.sns.index', compact('list', 'paginate'));
    }
}
