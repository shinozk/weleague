@extends('layouts.design')
@section('title', 'FINASH　女子サッカー情報サイト | TOP')
@section('description', 'FINASH　女子サッカー情報サイト TOP。最新の選手情報やチーム情報を確認！！なでしこリーグ、WEリーグの情報盛りだくさん' )
@section('keywords', '女子サッカー, 選手情報, チーム情報, ニュース, 選手名鑑, データベース, なでしこリーグ, WEリーグ')
@section('contents')

<div id="app">
    <section>
        <div class="container">
            <div class="top">
                <div class="top-wrapper">
                    <div class="container">
                        <div class="news">
                            <div class="news-page">
                                <div class="main-news">
                                    <a href="{{ route('news.detail', ['news' => $top->topNews]) }}">
                                      <img class="news-img__main" src="{{ $top->topNews->img_url }}" alt=""/>
                                    </a>
                                    <div class="text-col">
                                        <div class="text-top__main">
                                            <p>{{ $top->topNews->open_date }}</p>
                                            @foreach ($top->topNews->relations->take(3) as $relation)
                                            <span><a style="color:white" href="{{ "/{$relation->mode->value}/{$relation->this_id}" }}">{{ $relation->text }}</a></span>
                                            @endforeach
                                        </div>
                                        <a style="color:#111111" href="{{ route('news.detail', ['news' => $top->topNews]) }}">
                                            <div class="text-bottom__main">
                                               <h2>{{ $top->topNews->title }}</h2>
                                          </div>
                                        </a>
                                    </div>
                                </div>
                                <ul class="news-list">
                                    @foreach ($top->news as $news)
                                    <li class="sub-news">
                                        <div>
                                            <img class="news-img__sub" onclick="location.href = '{{ route('news.detail', compact('news')) }}'" src="{{ $news->img_url }}" alt="" />
                                            <div class="text-col">
                                                <div class="text-top__sub">
                                                    <p>{{ $news->open_date }}</p>
                                                    @foreach ($news->relations->take(2) as $relation)
                                                    <span><a style="color:white" href="{{ "/{$relation->mode->value}/{$relation->this_id}" }}">{{ $relation->text }}</a></span>
                                                    @endforeach
                                                </div>
                                                <div class="text-bottom__sub">
                                                    <a href="{{ route('news.detail', compact('news')) }}">
                                                       <h2>{{ $news->title }}</h2>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <a class="btn" href="{{ route('news.index') }}">
                                    <p>NEWS LIST</p>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="middle">
            <div class="middle-right">
                <section>
                    <div class="section-name">
                        <h2>Player</h2>
                        <p>PickUp</p>
                        <div class="container">
                            <div class="mach-result">
                                 <div class="result-sheet">
                                    <div class="result-list">
                                        <div class="result-header">
                                            <div class="header-inner">
                                                <h3>選手</h3>
                                                <a class="line-item" href="{{ route('players.index') }}">
                                                    <span>一覧　</span>
                                                    <span class="result-icon__right"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <ul>
                                            @foreach ($top->players as $player)
                                            <li class="result-col @if ( $loop->iteration % 2 == 0) back-color__e @else back-color__d @endif">
                                                <div class="result-item__top flex-start">
                                                    <div class="flex-start">
                                                        <a href="{{ route('players.detail', compact('player')) }}">
                                                            <p class="font-s">{{ $player->display_name }}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="middle-left">
                <section>
                    <div class="video">
                        <div class="section-name">
                            <h2>VIDEO</h2>
                            <p>動画</p>
                        </div>
                        <div class="video-item">
                            <a class="main-video" href="https://www.youtube.com/embed/?list=UUCp4d48-EN9WQRmfX9YQjIA">
                                <iframe width="100%" height="360px"
                                    src="https://www.youtube.com/embed/?list=UUCp4d48-EN9WQRmfX9YQjIA"
                                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                </iframe>
                            </a>
                            <div class="sub-video">
                                <a class="sub-video__left" href="https://www.youtube.com/embed/?list=UUImu8qJ7v1TOdZFe7JbFbxw">
                                    <iframe width="100%"
                                        src="https://www.youtube.com/embed/?list=UUImu8qJ7v1TOdZFe7JbFbxw"
                                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </a>
                                <a class="sub-video__left" href="https://www.youtube.com/embed/?list=PLddnt05D-xvSYo45J9n_-JKx4Iyj6tW8Q">
                                    <iframe width="100%"
                                        src="https://www.youtube.com/embed/?list=PLddnt05D-xvSYo45J9n_-JKx4Iyj6tW8Q"
                                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    @if ($top->games)
                    <div class="container">
                        <div class="mach-result">
                            <div class="section-name">
                                <h2>MATCH RESULT</h2>
                                <p>試合一覧</p>
                            </div>
                            <div class="result-sheet">
                                <div class="result-list">
                                    <div class="result-header">
                                        <div class="header-inner">
                                            <a
                                            class="flex-start"
                                            href="{{ route('games.index') }}">
                                                <h3>他の試合結果を見る</h3>
                                                <div class="result-icon__left">
                                                    <span></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @foreach ($top->games as $game)
                                    <ul>
                                        <li class="result-col @if ($loop->even) 'back-color__e' @else 'back-color__d' @endif">
                                            <div class="result-item__top flex-start">
                                                <div class="flex-start">
                                                    <p class="font-s">
                                                    {{ $game->title_detail }}
                                                    </p>
                                                    <p class="font-s">
                                                    {{ $game->game_time }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <p class="font-m">
                                                    {{ $game->stadium_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="result-item__bottm line-item">
                                                <div class="result-left line-item">
                                                    <a href="{{ route('teams.detail', ['team' => $game->home_team_id]) }}">
                                                        <div class="flex-start">
                                                            <img
                                                                width="32px"
                                                                src="{{ $game->home_team_image }}"
                                                                alt="{{ $game->home_team_name }}"/>
                                                            <p class="font-s">{{ $game->home_team_name }}</p>
                                                        </div>
                                                    </a>
                                                    <a href="{{ route("games.detail", ['id' => $game->id]) }}">
                                                        <p class="font-m">{{ $game->home_goal }}</p>
                                                    </a>
                                                </div>
                                                <a href="{{ route('games.detail', ['id' => $game->id]) }}">
                                                    <p class="result-ber font-m">-</p>
                                                </a>
                                                <div class="result-right line-item">
                                                    <a href="{{ route('games.detail', ['id' => $game->id]) }}">
                                                        <p class="font-m">{{ $game->away_goal }}</p>
                                                    </a>
                                                    <a href="{{ route('teams.detail', ['team' => $game->away_team_id]) }}">
                                                        <div class="flex-start">
                                                            <img
                                                                width="32px"
                                                                src="{{ $game->away_team_image }}"
                                                                alt="{{ $game->away_team_name }}"/>
                                                            <p class="font-s">{{ $game->away_team_name }}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="container">
                        <div class="mach-result">
                            <h5>試合情報がありません</h5>
                            <h5 style="margin: 40px"></h5>
                            <p><a href="/games">試合一覧に戻る→</a></p>
                        </div>
                    </div>
                    @endif
                </section>
                    <section>
                        <div class="section-name">
                            <h2>League</h2>
                        </div>
                            <a class="btn" href="{{ route('leagues.detail', ['league' => App\Enums\League::WeLeague]) }}">
                                <p>We League</p>
                                <span></span>
                            </a>
                            <a class="btn" href="{{ route('leagues.detail', ['league' => App\Enums\League::Nadeshiko1]) }}">
                                <p>なでしこリーグ1部</p>
                                <span></span>
                            </a>
                            <a class="btn" href="{{ route('leagues.detail', ['league' => App\Enums\League::Nadeshiko2]) }}">
                                <p>なでしこリーグ2部</p>
                                <span></span>
                            </a>
                    </section>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
