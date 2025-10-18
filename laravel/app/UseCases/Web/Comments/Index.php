<?php

namespace App\UseCases\Web\Comments;

use App\Models\Web\Comments\Comment as CommentModel;
use App\Enums\Comment;
use Illuminate\Database\Eloquent\Builder;

class Index
{
    public function invoke(Comment $comment, int $id): CommentDTO
    {
        $entity = $comment->getEntity();
        $model = $entity::find($id);
        $commentEntity = $comment->getCommentEntity();
        return new CommentDTO(
            $model,
            $commentEntity::select(['user_id', 'ip', 'user_agent', 'body'])
                ->where('relation_id', $id)
        );
    }
}
