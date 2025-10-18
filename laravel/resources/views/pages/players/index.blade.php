@extends('layouts.design')
@section('title', sprintf('選手一覧 | %dページ目', $players->currentPage()))
@section('description', 'なでしこリーグ, Weリーグ, 女子サッカー情報,  選手一覧')
@section('keywords', 'なでしこリーグ, Weリーグ, 女子サッカー情報サイト, 選手一覧')
@section('contents')

<div class="bread-range">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Top</a></li>
            <li class="breadcrumb-item active" aria-current="page">選手一覧</li>
        </ol>
    </nav>
</div>


<div id="app">
    <div class="container">
        <div class="middle">
            <div class="container">
                <div class="mach-result">
                    <div class="section-name">
                        <h2>Players</h2>
                        <p>選手一覧</p>
                    </div>
                    <div class="result-sheet">
                        <form method="GET">
                            <div class="result-list">
                                <input type="text" name="name" style="padding-left:20px;width:100%;height:40px;border-radius: 0.25rem;" placeholder="選手名" aria-label="Recipient's username">
                                <input style="margin:20px 0 0 20px; height:40px;border-radius: 0.25rem;" type="submit" value="検索">
                            </div>
                        </form>
                        <div class="result-list">
                            <div class="result-header">
                                <div class="header-inner">
                                    <h3>選手</h3>
                                </div>
                            </div>
                            <ul>
                                @foreach($players as $player)
                                <li class="result-col @if( $loop->iteration % 2 == 0 ) back-color__e @else back-color__d @endif">
                                    <div class="result-item__top flex-start">
                                        <a href="{{ route('players.detail', compact('player')) }}">
                                            <div class="flex-start">
                                                <p class="font-m">{{ $player->display_name }}</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="result-item__bottm line-item">
                                        <p class="font-m">{{ $player->info }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        {{ $players->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
@endsection