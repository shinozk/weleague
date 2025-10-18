<?php

namespace App\UseCases\Web\Comments;

use App\Models\Web\Comments\Post as Model;
use App\DataStorage\MySQL\Comment\User;
use App\Enums\Comment;

class Post
{
    public function invoke(Model $model)
    {
        $data = [
            'user_agent' => $model->user_agent,
            'ip' => $model->ip,
            'code' => $model->code
        ];

        $user = User::select(['id'])
                    ->where('code', $model->code)
                    ->first();
        if (!$user) {
            $user = User::create($data);
        }

        $comment = Comment::from($model->comment->mode);
        $entity = $comment->getCommentEntity();

        $data['relation_id'] = $model->comment->relation_id;
        $data['body'] = $model->body;
        $data['user_id'] = $user->id;
        return $entity::create($data);
    }
}
