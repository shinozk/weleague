<?php

namespace App\UseCases\Web\Comments;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CommentDTO
{
    public readonly Builder $builder;
    public readonly Model $model;

    function __construct(Model $model, Builder $builder)
    {
        $this->builder = $builder;
        $this->model = $model;
    }
}
