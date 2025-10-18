<?php

namespace App\Http\Requests\Web\Comments;

use App\Enums\Comment;
use App\Models\Web\Comments\Comment as CommentModel;
use App\Models\Web\Comments\Post as Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Post extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'max:500'],
            'mode' => ['required', 'string', Rule::in(Comment::values())],
            'relation_id' => ['required', 'numeric'],
            'g-recaptcha-response' => ['required', 'string']
        ];
    }

    public function makeModel(): Model
    {
        $comment = new CommentModel();
        $comment->relation_id = $this->relation_id;
        $comment->mode = $this->mode;

        $model = new Model();
        $model->ip = $this->ip();
        $model->user_agent = $this->header('User-Agent');
        $model->body = $this->body;
        $model->comment = $comment;
        $model->setCode();
        return $model;
    }
}
