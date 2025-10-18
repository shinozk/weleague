<?php

namespace App\Http\Requests\Ajax\Teams;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Ajax\Teams\Ranking as Model;

class Ranking extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        $start_year = config('site.start_year');
        $year = config('site.year');
        return [
            'id' => 'required|integer',
            'year' => ['required', 'integer', "between:${start_year},${year}"],
        ];
    }

    public function makeModel(): ?Model
    {
        $model = new Model();
        $model->year = $this->year ?? null;
        $model->id = $this->id ?? null;
        return $model;
    }
}
