@extends('layouts.default')
@section('title', $game->label)
@section('description', sprintf( '%s,  FINASH　女子サッカー情報サイト 試合情報', $game->label))
@section('keywords', sprintf( '%s, %s, %s,　女子サッカー情報サイト, 試合情報, 戦績, 成績', $game->home_team_name, $game->away_team_name, $game->title))
@section('contents')

<div id="app">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Top</a></li>
                    <li class="breadcrumb-item"><a href="/games">試合一覧</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $game->label }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="match-card">
                    <h5>対戦カード</h5>
                    <ul>
                        <li><span>{{ $game->title }}&nbsp;{{ $game->title_detail }}</span></li>
                        <li>Home：<a href="/team/{{ $game->home_team_id }}">{{ $game->home_team_name }}</a></li>
                        <li>Away：<a href="/team/{{ $game->away_team_id }}">{{ $game->away_team_name }}</a></li>
                        <li>DateTime：{{ $game->game_time }}</li>
                        <li>Stadium：<a href="#">{{ $game->stadium_name }}</a></li>
                        @if ($game->audience)
                        <li>観客動員数: {{ $game->audience }}人</li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="match-card">
                    <h5>スコア</h5>
                    <table class="mdl-data-table goal-table" style="table-layout:fixed">
                        <tr>
                            <td rowspan="2" style="border-style:none;">{{ $game->home_goal }}</td>
                            <td style="border-top-style:none;">{{ $game->score1st_home }}</td>
                            <td style="border-top-style:none;">前半</td>
                            <td style="border-top-style:none;">{{ $game->score1st_away }}</td>
                            <td rowspan="2" style="border-style:none;">{{ $game->away_goal }}</td>
                        </tr>
                        <tr>
                            <td style="border-bottom-style:none;">{{ $game->score2nd_home }}</td>
                            <td style="border-bottom-style:none;">後半</td>
                            <td style="border-bottom-style:none;">{{ $game->score2nd_away }}</td>
                        </tr>
                        @if (is_numeric($game->score1ex_home))
                        <tr>
                            <td></td>
                            <td style="border-bottom-style:none;">{{ $game->score1ex_home }}</td>
                            <td style="border-bottom-style:none;">延長前半</td>
                            <td style="border-bottom-style:none;">{{ $game->score1ex_away }}</td>
                            <td></td>
                        </tr>
                        @endif
                        @if (is_numeric($game->score2ex_home))
                        <tr>
                            <td></td>
                            <td style="border-bottom-style:none;">{{ $game->score2ex_home }}</td>
                            <td style="border-bottom-style:none;">延長後半</td>
                            <td style="border-bottom-style:none;">{{ $game->score2ex_away }}</td>
                            <td></td>
                        </tr>
                        @endif
                        @if (is_numeric($game->scorePK_home))
                        <tr>
                            <td></td>
                            <td style="border-bottom-style:none;">{{ $game->scorePK_home }}</td>
                            <td style="border-bottom-style:none;">PK</td>
                            <td style="border-bottom-style:none;">{{ $game->scorePK_away }}</td>
                            <td></td>
                        </tr>
                        @endif
                        <tr>
                            <td><img class="table-icon rounded-circle" src="{{ $icons[$game->home_team_id] }}"></td>
                            <td colspan="3"></td>
                            <td><img class="table-icon rounded-circle" src="{{ $icons[$game->away_team_id] }}"></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div class="match-card-no-height" style="min-height:200px;">
                    <h5>得点者</h5>
                    @isset ($actions['Goal'])
                    @foreach ($actions['Goal'] as $team_id => $team)
                    <ul class="mdl-list match-scorer">
                        <li class="score-team"><img class="ul-icon" src="{{ $icons[$team_id] }}"><a href="/team/{{ $team_id }}/">{{ $team_id === $game->home_team_id ? $game->home_team_name : $game->away_team_name }}</a></li>
                        @foreach ($team as $goal)
                        <li class="score-player">{{ $goal->time_display }}
                            @if ($goal->player_name === 'オウンゴール')
                            O.G
                            @else
                          <a href="/player/{{ $goal->player_id }}">{{ $goal->player_name }}</a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
                    @else
                        <p>なし</p>
                    @endisset
                </div>
            </div>

            <div class="col-md-4">
                <div class="match-card-no-height">
                    <h5>{{ $game->home_team_name}} 選手</h5>
                    <ul class="mdl-list match-scorer">
                        <li class="score-team"><img class="ul-icon" src="{{ $icons[$game->home_team_id] }}">先発</li>
                        @foreach($members_home as $member)
                        @if($member->type === 'Start')
                        <li class="score-player">{{$member->position}}&nbsp{{$member->uniform_number}}&nbsp
                            <a href="/players/{{ $member->player_id }}">{{ $member->player_name }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                    <ul class="mdl-list match-scorer">
                        <li class="score-team">サブ</li>
                        @foreach($members_home as $member)
                        @if($member->type === 'Sub')
                        <li class="score-player">{{$member->position}}&nbsp{{$member->uniform_number}}&nbsp
                            <a href="/players/{{ $member->player_id }}">{{ $member->player_name }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="match-card-no-height">
                    <h5>{{ $game->away_team_name}} 選手</h5>
                    <ul class="mdl-list match-scorer">
                        <li class="score-team"><img class="ul-icon" src="{{ $icons[$game->away_team_id] }}">先発</li>
                        @foreach($members_away as $member)
                        @if($member->type === 'Start')
                        <li class="score-player">{{$member->position}}&nbsp{{$member->uniform_number}}&nbsp
                            <a href="/players/{{ $member->player_id }}">{{ $member->player_name }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                    <ul class="mdl-list match-scorer">
                        <li class="score-team">サブ</li>
                        @foreach($members_away as $member)
                        @if($member->type === 'Sub')
                        <li class="score-player">{{$member->position}}&nbsp{{$member->uniform_number}}&nbsp
                            <a href="/players/{{ $member->player_id }}">{{ $member->player_name }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="match-card-no-height">
                    <h5>広告</h5>
                    @include('elements/m4-ad')
                </div>
            </div>
            @isset ($actions['In'])
            <div class="col-md-4">
                <div class="match-card-no-height">
                    <h5>選手交代</h5>
                    @foreach($actions['In'] as $team_id => $team)
                    <ul class="mdl-list match-scorer">
                        <li class="score-team"><img class="ul-icon" src="{{ $icons[$team_id] }}"><a href="/teams/{{ $team_id }}">{{ $team_id === $game->home_team_id ? $game->home_team_name : $game->away_team_name }}</a></li>
                        @foreach ($team as $action)
                        <li class="score-player">{{ $action->time_display }}'&nbsp; {{ $action->action }} &nbsp;<a href="/players/{{ $action->player_id }}">{{ $action->player_name }}</a></li>
                        @endforeach
                    </ul>
                    @endforeach
                </div>
            </div>
            @endisset

            @isset($actions['Card'])
            <div class="col-md-4">
                <div class="match-card-no-height">
                  <h5>警告・退場</h5>
                  @foreach($actions['Card'] as $team_id => $team)
                  <ul class="mdl-list match-scorer">
                    <li class="score-team"><a href="/teams/{{ $team_id }}">{{ $team_id === $game->home_team_id ? $game->home_team_name : $game->away_team_name }}</a></li>
                    @foreach ($team as $action)
                    <li class="score-player">{{ $action->time_display }}'&nbsp;
                        <span class="card-{{ strtolower($action->action) }}"></span>
                        <a href="/player/{{ $action->player_id }}">{{ $action->player_name }}
                        </a>
                    </li>
                    @endforeach
                  </ul>
                  @endforeach
                </div>
            </div>
            @endisset

            @if ($game->movie_url)
            <div class="col-md-4">
                <div class="match-card-no-height">
                    <h5>動画</h5>
                    <iframe width="100%" height="256"
                        src="{{ $game->movie_url }}"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
              </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
