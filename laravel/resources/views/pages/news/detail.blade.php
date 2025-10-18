@extends('layouts.default')
@section('title', 'ニュース | ' . $news->title)
@section('description', $news->title . 'FINASH　女子サッカー情報サイト ニュース')
@section('keywords', $news->title . ', FINASH,　女子サッカー情報サイト, ニュース')
@section('contents')

<div id="app">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Top</a></li>
                    <li class="breadcrumb-item"><a href="/news">ニュース一覧</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="news">
                    <div class="news-text">
                        <h4 style="margin:40px 0 40px 0;"></h4>
                        <h3>{{ $news->title }}</h3>
                        <div class="news">
                            {!! $news->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="player-img">
                    <div class="news-img">
                        <ul class="list-group">
                            <li class="list-group-item disabled">関連タグ</li>
                            <li class="list-group-item">
                                <div class="tag-card">
                                    @foreach($news->relations ?? [] as $row)
                                    <a class="btn btn-default" href="/{{ $row->mode->value }}/{{ $row->this_id }}">{{ $row->text }}</a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h5 style="margin:10px"></h5>
                <news-relation
                    mode="{{ $news->relations?->first()->mode->value ?? null }}"
                    id={{ $news->relations?->first()->this_id ?? null }}></news-relation>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection