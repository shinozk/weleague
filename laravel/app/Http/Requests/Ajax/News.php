<?php

namespace App\Http\Requests\Ajax;

use App\Enums\NewsMode;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;

class News extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'    => ['required_unless:mode' => null, 'numeric'],
            'limit' => 'nullable|numeric',
            'page'  => 'nullable|numeric',
            'mode'  => ['nullable','string', new Enum(NewsMode::class)],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json($validator->errors()->toArray(), 422)
        );
    }
}
