@extends('layouts.default')
@section('title', "FINASH　女子サッカー情報サイト | " . $league->label() . " | ニュース一覧")
@section('description', 'FINASH　女子サッカー情報サイト ニュース一覧。最新の選手情報やチーム情報を確認！！なでしこリーグ、WEリーグの情報盛りだくさん' )
@section('keywords', "女子サッカー, " . $league->label() . ", チーム情報, ニュース, 選手名鑑, データベース, なでしこリーグ, WEリーグ")
@section('contents')


<div id="app">
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Top</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('leagues.detail', $league) }}">{{ $league->label() }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ニュース一覧</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <h1>{{ $league->label() }}のニュース一覧</h1>
            @foreach($news as $row)
            <div class="col-md-4">
                <div class="news-card">
                    <a href="/news/{{ $row->id }}">
                        <div class="news-card-image">
                            <img class="card-img-top" src="{{ $row->img_url }}" alt="{{ $row->title }}" />
                        </div>
                        <h4 style="margin:10px 0 10px 0;"></h4>
                    </a>
                    <div class="news-title">
                        <a href="/news/{{ $row->id }}">
                            <p>{{ $row->title }}</p>
                        </a>
                        <div class="tag-card">
                            @foreach($row->relations ?? [] as $tag)
                            <a class="btn btn-default" type="button" href="/{{ $tag->mode->value }}/{{ $tag->this_id }}">
                                {{ $tag->text }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <p class="card-date">{{ $row->open_date }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $news->onEachSide(5)->links() }}

</div>
@endsection
@section('script')
@endsection