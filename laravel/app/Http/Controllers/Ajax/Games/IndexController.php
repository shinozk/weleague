<?php

namespace App\Http\Controllers\Ajax\Games;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ajax\Games\Index as Request;
use App\UseCases\Ajax\Games\Index as UseCase;
use App\Repositories\HistoryRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexController extends Controller
{
    public function __invoke(Request $request, UseCase $useCase)
    {
        $model = $request->makeModel();
        $pages = $useCase
            ->invoke($model)
            ->paginate(50);

        $movies = $pages->pluck('movie_url')
            ->filter()
            ->shift(3);
        if (!$movies || $movies->isEmpty()) {
            $movies = [];
        } else {
            $movies->toArray();
        }

        $icons = HistoryRepository::getIcons($model->year);
        foreach ($pages as $item) {
            $item->game_time = $item->game_time;
            $item->home_team_image = $icons[$item->home_team_id] ?? $item->home_team_id;
            $item->away_team_image = $icons[$item->away_team_id] ?? $item->away_team_id;
        }

        $pager = [
            'total' => $pages->total(),
            'last_page' => $pages->lastPage(),
            'per_page' => $pages->perPage(),
            'current_page' => $pages->currentPage(),
        ];

        $league_games = $pages->groupBy('league_id');
        return new JsonResource([
            'data' => compact(
                'league_games',
                'movies',
                'pager'
            )
        ]);
    }
}
