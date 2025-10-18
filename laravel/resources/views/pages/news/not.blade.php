@extends('layouts.default')
@section('title', "FINASH　女子サッカー情報サイト | ニュースがみつかりません")
@section('description', 'FINASH　女子サッカー情報サイト ニュース一覧。最新の選手情報やチーム情報を確認！！なでしこリーグ、WEリーグの情報盛りだくさん' )
@section('keywords', "女子サッカー, チーム情報, ニュース, 選手名鑑, データベース, なでしこリーグ, WEリーグ")
@section('contents')


<div id="app">
    <div class="container">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Top</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">ニュース一覧</a></li>
                    <li class="breadcrumb-item active" aria-current="page">記事がありません</li>
                </ol>
            </nav>
        </div>
        <h5 style="margin:64px"></h5>
        <div class="row">
            <h5 style="margin:64px"></h5>

            <h1>記事がありません</h1>
            <h5 style="margin:64px"></h5>

            <h5 style="margin:64px"></h5>

        </div>
    </div>

</div>
@endsection
@section('script')
@endsection