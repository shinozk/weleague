<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', App\Http\Controllers\Web\Top\IndexController::class)->name('top');
Route::get('/2024', fn() => view('pages.2024.index'))->name('2024.index');
Route::get('/2024/spain', fn() => view('pages.2024.spain'))->name('2024.spain');

Route::name('teams.')
    ->prefix('teams')
    ->namespace('App\Http\Controllers\Web\Teams')
    ->group(
        function () {
            Route::get('/{team}', DetailController::class)->name('detail');
            Route::get('/{team}/{year}/players', PlayersController::class)->name('players');
            Route::get('/{team}/players/{year}', PlayersController::class);
        }
    );


Route::name('news.')
    ->prefix('news')
    ->namespace('App\Http\Controllers\Web\News')
    ->group(
        function () {
            Route::get('/', IndexController::class)->name('index');
            Route::get('__HOME_URL__', fn() => redirect(route('news.index')));
            Route::get('not', fn() => view('pages.news.not'))->name('not');
            Route::get('/{newsMode}/{id}', NewsModeController::class)->where('id', '[0-9]+')->name('mode');
            Route::get('/{news}', DetailController::class)->where('id', '[0-9]+')->name('detail');
        }
    );

Route::name('players.')
    ->prefix('players')
    ->namespace('App\Http\Controllers\Web\Players')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{player}', DetailController::class)->name('detail');
        Route::get('sns', Sns\IndexController::class)->name('sns');
        Route::post('sns', Sns\PostController::class)->name('sns.post');
        Route::get('/{player}/sns/register', Sns\RegisterController::class)->name('sns.regist');
    });

Route::name('leagues.')
    ->prefix('leagues')
    ->namespace('App\Http\Controllers\Web\Leagues')
    ->group(function () {
        Route::get('/{league}', DetailController::class)->name('detail');
        Route::get('/{league}/news', NewsController::class)->name('news');
    });

Route::name('comments.')
    ->prefix('comments')
    ->namespace('App\Http\Controllers\Web\Comments')
    ->group(function () {
        Route::get('{mode}/{id}', IndexController::class)->name('index');
        Route::post('{mode}/{id}', PostController::class)->name('post');
    });


Route::name('games.')
    ->prefix('games')
    ->namespace('App\Http\Controllers\Web\Games')
    ->group(function () {
        Route::get('/{id}', DetailController::class)->where('id', '[0-9]+')->name('detail');
        Route::get('/{mode?}/{id?}/{action?}', IndexController::class)->name('index');
    });


// redirect to
// ↓
Route::get('/test', function () {
    return view('top');
});

Route::get('/player/{id}', function (int $player) {
    return redirect('players/' . $player, 301);
});

Route::get('/team/{id}', function (int $id) {
    return redirect('teams/' . $id, 301);
});

Route::get('/match/{id}', function (int $id) {
    return redirect('games/' . $id, 301);
});

Route::get('/team_player/{id}', function (int $id, Request $request) {
    if (!$request->year) {
        return redirect('teams/' . $id, 301);
    }
    return redirect(sprintf('teams/%d/%d/players', $id, $request->year), 301);
});
