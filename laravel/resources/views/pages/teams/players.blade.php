@extends('layouts.default')
@section('title', sprintf('%s（%d年）所属選手一覧', $team->name, $year))
@section('description', sprintf( '%s（%s）%d年　所属選手一覧, 本拠地：%s FINASH　女子サッカー情報サイト ', $team->name, $year, $team->english, $team->hometown))
@section('keywords', sprintf( '%s, %s, FINASH,　女子サッカー情報サイト, チーム情報, 戦績, 成績', $team->name, $team->english))
@section('contents')

<div id="app">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Top</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('teams.detail', compact('team')) }}">{{ $team->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">（{{ $year }}年）所属選手一覧</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">チーム情報</li>
                        @if ($imgUrl)
                        <li class="list-group-item"><img class="player-image resposive-img" src="{{ $imgUrl }}" alt="{{ $team->name . $year . "年"}}"></li>
                        @endif
                        <li class="list-group-item">{{ $team->name }}</li>
                        <li class="list-group-item">{{ $team->english }}</li>
                        <li class="list-group-item">本拠地：{{ $team->hometown }}</li>
                        @if ($team->establish)
                        <li class="list-group-item">設立：{{ $team->establish }}年</li>
                        @endif
                    </ul>
                </div>

                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">{{ $year }}年　シーズン成績</li>
                        @foreach($team->leagues($year)->get() as $ranking)
                        <li class="list-group-item list-group-item-success">{{ $ranking->league_name }}　成績</li>
                        <li class="list-group-item">順位：{{ $ranking->rank }}位</li>
                        <li class="list-group-item">試合数：{{ $ranking->matches }}</li>
                        <li class="list-group-item">勝-分-負：{{ $ranking->win }}-{{ $ranking->draw }}-{{ $ranking->lose }}</li>
                        <li class="list-group-item">勝点：{{ $ranking->point }}</li>
                        <li class="list-group-item list-group-item-default" style="text-align:end"><a href="/games/leagues/{{ $ranking->league_id }}?year={{ $year }}">→試合一覧</a></li>
                        @endforeach
                    </ul>
                </div>


                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">広告</li>
                        <li style="display:none"></li>
                    </ul>
                </div>

                <news-relation mode="teams" :id="{{ $team->id }}" />
            </div>
            <div class="col-md-4">
                <team-select-year :id='{{ $team->id }}' :year='{{ $year }}'></team-select-year>

                <div class="row">
                    @foreach ($teamPlayer as $row)
                    <div class="col-md-6">
                        <a href="/players/{{ $row->player_id }}">
                        <div class="player-card">
                            @if ($row->photo)
                            <img class="card-img-top" src="{{ $row->photo }}">
                            @endif
                            <p>
                                <span class="tag-card">{{ $row->position }}　　{{ $row->uniform_number }}</span>
                            </p>
                            <div class="news-title">
                                <p>{{ $row->player_name }}</p>
                                <p>{{ $row->player->birthday }}</p>
                            </div>

                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-img">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">掲示板</li>
                        <li class="list-group-item"><a class="btn btn-success" href="{{ route('comments.post', ['mode' => 'teams', 'id' => $team->id]) }}">掲示板に行く</a></li>
                    </ul>
                </div>
                <div class="player-movie">
                    <youtube keyword='{{ $team->name }}' />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
