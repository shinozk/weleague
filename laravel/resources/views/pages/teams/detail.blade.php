@extends('layouts.default')
@section('title', $team->name . ' | FINASH')
@section('description', sprintf( '%s, 本拠地：%s, 設立；%s FINASH　女子サッカー情報サイト チーム情報', $team->name, $team->hometown, $team->establish))
@section('keywords', sprintf( '%s, %s, FINASH,　女子サッカー情報サイト, チーム情報, 戦績, 成績', $team->name, $team->english))
@section('contents')

<div id="app">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Top</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $team->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            @foreach($rankings as $year => $leagues)
            <div class="col-md-4">
                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">{{ $year }}年　シーズン成績</li>
                        @foreach($leagues as $ranking)
                        <li class="list-group-item list-group-item-success">{{ $ranking->league_name }}　成績</li>
                        <li class="list-group-item">順位：{{ $ranking->rank }}位</li>
                        <li class="list-group-item">試合数：{{ $ranking->matches }}</li>
                        <li class="list-group-item">勝-分-負：{{ $ranking->win }}-{{ $ranking->draw }}-{{ $ranking->lose }}</li>
                        <li class="list-group-item">勝点：{{ $ranking->point }}</li>
                        <li class="list-group-item list-group-item-default" style="text-align:end"><a href="/games/leagues/{{ $ranking->league_id }}?year={{ $year }}">→試合一覧</a></li>
                        @endforeach
                        <li class="list-group-item list-group-item-primary" style="text-align:end"><a href="{{ route('teams.players', compact(['team', 'year'])) }}">→{{ $year }}年　在籍選手一覧</a></li>
                    </ul>
                </div>
                @if( $loop->iteration % 3 == 0)
                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">広告</li>
                        @include('elements/m4-ad')
                        <li style="display:none"></li>
                    </ul>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">チーム情報</li>
                        <li class="list-group-item">{{ $team->name }}</li>
                        <li class="list-group-item">本拠地：{{ $team->hometown }}</li>
                        <li class="list-group-item">設立：{{ $team->establish }}年</li>
                    </ul>
                </div>

                <div class="player-profile">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-secondary">広告</li>
                        @include('elements/m4-ad')
                        <li style="display:none"></li>
                    </ul>
                </div>

                <news-relation mode="teams" :id="{{ $team->id }}" />
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
