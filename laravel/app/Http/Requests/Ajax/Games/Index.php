<?php

namespace App\Http\Requests\Ajax\Games;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\Game\Action;
use App\Models\Ajax\Games\Index as Model;

class Index extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mode' => ['nullable', 'string', Rule::in('teams', 'players', 'leagues')],
            'id' => ['required_unless:mode' => null, 'numeric'],
            'action' => ['nullable', 'string', Rule::in(Action::names())],
        ];
    }

    public function makeModel(): ?Model
    {
        $model = new Model();
        $model->mode = $this->mode ?? null;
        $model->year = $this->year ?? null;
        $model->id = $this->id ?? null;
        $model->action = $this->action ?? null;
        return $model;
    }
}
