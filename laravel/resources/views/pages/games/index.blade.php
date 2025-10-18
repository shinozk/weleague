@extends('layouts.design')
@section('title', $title )
@section('description', sprintf('%s年シーズン, なでしこリーグ, Weリーグ, 女子サッカー情報, 試合一覧', $model->year))
@section('keywords', sprintf('%s年シーズン, なでしこリーグ, Weリーグ, 女子サッカー情報サイト, 試合情報, 戦績, 成績', $model->year))
@section('contents')

<div class="bread-range">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Top</a></li>
            @if ( $model->year == 2022 && !$model->mode)
            <li class="breadcrumb-item active" aria-current="page">試合一覧</li>
            @else
            <li class="breadcrumb-item" ><a href="/games">試合一覧</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            @endif
        </ol>
    </nav>
</div>


<div id="app">
    <game-select-year :year={{ $model->year }}></game-select-year>
    <div class="container">
        <div class="middle">
            <div class="middle-right">
                <section>
                    <div>
                        <div class="advertising">
                            広告

                        </div>
                    </div>
                </section>
            </div>
            <div class="middle-left">
                <game-list
                            @if($model->mode)
                                mode="{{ $model->mode }}"
                            @endif
                                :year={{ $model->year }}
                            @if($model->id)
                                :id={{ $model->id }}
                            @endif
                            @if($model->action)
                                action="{{ $model->action }}"
                            @endif
                            title="{{ $title }}">
                </game-list>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
@endsection
