@extends('layouts.design')
@section('title', $title )
@section('description', sprintf( '%s, なでしこリーグ, Weリーグ, 女子サッカー情報, 試合一覧', $player->name))
@section('keywords', sprintf( '%s, なでしこリーグ, Weリーグ, 女子サッカー情報サイト, 試合情報, 戦績, 成績', $player->name))
@section('contents')

<div class="bread-range">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Top</a></li>
            <li class="breadcrumb-item"><a href="/games/">試合一覧</a></li>
            <li class="breadcrumb-item"><a href="/players/{{ $player->id }}">{{ $player->name }}選手</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
</div>

<div id="app">
    <div class="container">
        <div class="middle">
            <div class="middle-right">
                <section>
                    <div>
                        <div class="advertising">
                            広告
                            @include('elements/m4-ad')
                        </div>
                    </div>
                </section>
            </div>
            <div class="middle-left">
                @isset ($movies[0])
                <section>
                    <div class="video">
                        <div>
                            <div class="section-name">
                                <h2>VIDEO</h2>
                                <h5>{{ $title }}</h5>
                                <p>動画</p>
                            </div>
                            <div class="video-item">
                                <a class="main-video"  href="{{ $movies[0] }}">
                                    <iframe width="100%" height="360px"
                                        src="{{ $movies[0] }}"
                                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </a>
                                <div class="sub-video">
                                    @isset ($movies[1])
                                    <a class="sub-video__left" href="{{ $movies[1]}}">
                                        <iframe width="100%"
                                            src="{{ $movies[1] }}"
                                            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </a>
                                    @endisset
                                    @isset ($movies[2])
                                    <a class="sub-video__left" href="{{ $movies[2] }}">
                                        <iframe width="100%"
                                            src="{{ $movies[2] }}"
                                            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endisset
                <section>
                    <div class="container">
                        <div class="advertising advertising-none advertising-release">
                            広告
                            @include('elements/m4-ad')
                        </div>
                    </div>
                </section>
                <section>
                    <div class="container">
                        <div class="mach-result">
                            <div class="section-name">
                                <h2>Games</h2>
                                <h5>{{ $title }}</h5>
                                <p>試合一覧</p>
                            </div>
                            @foreach ($games as $league_id => $items)
                            <div class="result-sheet">
                                <div class="result-list">
                                    <div class="result-header">
                                        <div class="header-inner">
                                            <a class="flex-start" href="#">
                                                <h3>{{ $league_list[$league_id] }}</h3>
                                                <div  class="result-icon__left">
                                                    <span></span>
                                                </div>
                                            </a>
                                            <a class="line-item" href="/players/{{ $player->id }}">
                                                <p>選手情報を見る</p>
                                                <span class="result-icon__right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @include('elements/games/list', ['items' => $items])
                                @endforeach
                                {{ $pages->onEachSide(5)->links() }}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<style>
.pagination {
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 0.25rem;
}

.page-link {
  position: relative;
  display: block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #3490dc;
  background-color: #fff;
  border: 1px solid #dee2e6;
}
.page-link:hover {
  z-index: 2;
  color: #1d68a7;
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.page-link:focus {
  z-index: 3;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
}

.page-item:first-child .page-link {
  margin-left: 0;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}
.page-item:last-child .page-link {
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}
.page-item.active .page-link {
  z-index: 3;
  color: #fff;
  background-color: #3490dc;
  border-color: #3490dc;
}
.page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  cursor: auto;
  background-color: #fff;
  border-color: #dee2e6;
}

.pagination-lg .page-link {
  padding: 0.75rem 1.5rem;
  font-size: 1.125rem;
  line-height: 1.5;
}
.pagination-lg .page-item:first-child .page-link {
  border-top-left-radius: 0.3rem;
  border-bottom-left-radius: 0.3rem;
}
.pagination-lg .page-item:last-child .page-link {
  border-top-right-radius: 0.3rem;
  border-bottom-right-radius: 0.3rem;
}

.pagination-sm .page-link {
  padding: 0.25rem 0.5rem;
  font-size: 0.7875rem;
  line-height: 1.5;
}
.pagination-sm .page-item:first-child .page-link {
  border-top-left-radius: 0.2rem;
  border-bottom-left-radius: 0.2rem;
}
.pagination-sm .page-item:last-child .page-link {
  border-top-right-radius: 0.2rem;
  border-bottom-right-radius: 0.2rem;
}
</style>
@endsection
@section('script')
@endsection
