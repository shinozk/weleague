@extends('layouts.design')
@section('title', 'FINASH　女子サッカー情報サイト | TOP')
@section('description', 'FINASH　女子サッカー情報サイト TOP。最新の選手情報やチーム情報を確認！！なでしこリーグ、WEリーグの情報盛りだくさん' )
@section('keywords', '女子サッカー, 選手情報, チーム情報, ニュース, 選手名鑑, データベース, なでしこリーグ, WEリーグ')
@section('contents')

<div id="app">
    <div class="container">
        <div class="middle">
            <div class="middle-right">
                <section>
                    <div class="advertising">
                    広告
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
                                <a class="sub-video__left" href="https://www.youtube.com/embed/pKSs3bpjkww">
                                    <iframe width="100%"
                                        src="https://www.youtube.com/embed/pKSs3bpjkww"
                                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            @foreach($teams as $i => $row)
            <div class="video-item">
                <div class="news-card">
                    <a href="/teams/{{ $row->team_id }}">
                        <img width="25%" src="{{ $row->img_url }}" alt="{{ $row->name }}"/>
                        <h4 style="margin:10px 0 10px 0;"></h4>
                    </a>
                    <div class="news-title">
                        <a href="/teams/{{ $row->team_id }}"><p>{{ $row->name }}</p></a>
                    </div>
                </div>
            </div>
            @if(($i + 1 ) % 4 === 0)
        </div>
            <div class="container">

            @endif
            @endforeach
        </div>
    </section>
</div>
@endsection
@section('script')
@endsection
