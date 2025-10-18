<?php

namespace App\Repositories;

use App\DataStorage\MySQL\News\News;
use App\Enums\League;
use App\Enums\NewsMode;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class NewsRepository
{
    public static function get(int $id): News
    {
        return News::with(['relations'])
            ->find($id);
    }

    public static function fetch(?NewsMode $mode = null, ?int $id = null, ?int $limit = null, ?int $page = null): Builder
    {
        return News::select(['id', 'title', 'img_url', 'open_date'])
            ->with(['relations:id,news_id,mode,text,this_id'])
            ->when(
                !is_null($mode) && !is_null($id),
                fn(EloquentBuilder $query) => $query->whereHas(
                    'relations',
                    fn(EloquentBuilder $q) =>
                    $q->where('mode', $mode)
                        ->where('this_id', $id)
                )
            )
            ->when($limit, fn(EloquentBuilder $query) => $query->limit($limit))
            ->when($page, fn(EloquentBuilder $query) => $query->offset(($page - 1) * $limit))
            ->orderBy('open_date', 'desc');
    }

    public static function fetchByLeague(League $league, int $year): Builder
    {
        return News::select(['id', 'title', 'img_url', 'open_date'])
            ->withWhereHas(
                'relations',
                fn($query) =>
                $query->where('mode', NewsMode::TEAM)
                    ->whereIn('this_id', $league->teamIds($year))
            )
            ->orderByDesc('open_date');
    }
}
