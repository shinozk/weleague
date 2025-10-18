<?php

namespace App\Http\Requests\Web\Players\Sns;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\SNSAccount;
use App\Models\Web\Players\Sns\Post as Model;

class Post extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sns[Twitter]' => ['nullable', 'url'],
            'sns[Instagram]' => ['nullable', 'url'],
            'sns[YouTube]' => ['nullable', 'url'],
            'player_id' => ['required', 'numeric'],
            'g-recaptcha-response' => ['required', 'string']
        ];
    }

    public function makeModel(): ?array
    {
        $records = [];
        foreach (SNSAccount::cases() as $sns) {
            if (!$this->sns[$sns->name]) {
                continue;
            }
            $model = new Model();
            $model->player_id = $this->player_id;
            $model->sns = $sns;
            $model->code = ltrim(parse_url($this->sns[$sns->name], PHP_URL_PATH), '/');
            $records[] = $model;
        }

        return $records;
    }
}
