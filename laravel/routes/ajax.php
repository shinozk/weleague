<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax;

Route::any('/news', Ajax\NewsController::class)->name('news');

Route::name('players.')->prefix('players')->group(
    function () {
        Route::post('/{player}/belong', Ajax\Players\BelongController::class)->name('belong');
        Route::post('/{player}/sns_timeline', Ajax\Players\SnsTimeLineController::class)->name('sns');
    }
);

Route::name('teams.')->prefix('teams')->group(function () {
    Route::post('/select_year', Ajax\Teams\SelectYearController::class)->name('year');
    Route::post('/ranking', Ajax\Teams\RankingController::class)->name('ranking');
});

Route::post('/games/lists', Ajax\Games\IndexController::class)->name('games.list');
