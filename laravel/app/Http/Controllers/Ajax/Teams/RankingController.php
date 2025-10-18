<?php

namespace App\Http\Controllers\Ajax\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ajax\Teams\Ranking as Request;
use App\UseCases\Ajax\Teams\Ranking as UseCase;
use App\Repositories\HistoryRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class RankingController extends Controller
{
    public function __invoke(Request $request, UseCase $useCase)
    {
        $model = $request->makeModel();
        $ret = $useCase->invoke($model);

        $icons = HistoryRepository::getIcons($model->year);
        foreach ($ret as $item) {
            $item->team_image = $icons[$item->team_id];
        }

        return new JsonResource(['data' => $ret]);
    }
}
