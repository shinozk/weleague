<?php

namespace App\Http\Controllers\Web\Games;

use App\Enums\Game\Action;
use App\Http\Controllers\Controller;
use App\Models\Web\Games\Index as Model;
use App\Repositories\PlayerRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(
        Request $request,
        ?string $mode = 'all',
        ?int $id = null,
        ?string $action = null
    ) {
        $model = new Model();
        $model->mode = !is_null($id) ? $mode : null;
        $model->id = $id;
        $model->year = $request->year ?? (int)config('site.year');
        $model->action = $mode === 'players' ? $action : null;

        $league_list = config('site.leagueIds');
        switch ($model->mode) {
            case 'players':
                $player = PlayerRepository::getPlayer($model->id);
                if (!$player) {
                    redirect(config('app.url'));
                }
                if (is_null($action)) {
                    $title = sprintf('%s年シーズン | %s選手', $model->year, $player->name);
                } else {
                    $enum = Action::from($action);
                    $title = sprintf('%s年シーズン | %s選手 | %s', $model->year, $player->name, $enum->description());
                }
                break;
            case 'leagues':
                if (!$league_list[$model->id] ?? false) {
                    redirect(config('app.url'));
                }
                $title = sprintf('%s年シーズン | %s', $model->year, $league_list[$model->id]);
                break;
            default:
                if (config('site.year') == $model->year) {
                    $title = '試合一覧';
                } else {
                    $title = sprintf('%s年シーズン', $model->year);
                }
                break;
        }

        return view('pages.games.index', compact(
            'title',
            'model'
        ));
    }
}
