<?php

namespace App\Http\Controllers\Ajax\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCases\Ajax\Teams\SelectYear as UseCase;
use Illuminate\Http\Resources\Json\JsonResource;

class SelectYearController extends Controller
{
    public function __invoke(Request $request, UseCase $useCase)
    {
        $id = $request->id ?? null;
        if (!$id) {
            return response()->json(['status' => 'fail'], 400);
        }
        $ret = $useCase->invoke($id);

        return new JsonResource($ret);
    }
}
