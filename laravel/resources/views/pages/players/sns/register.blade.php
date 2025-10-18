@extends('layouts.default')
@section('title', $player->name . ' | SNS登録')
@section('description', sprintf( '%s, 生年月日%s, %s FINASH　女子サッカー情報サイト SNS登録', $player->display_name, $player->birthday, $player->info))
@section('keywords', sprintf( '%s, %s, FINASH,　女子サッカー情報サイト, SNS登録, 戦績, 成績', $player->name, $player->english))
@section('contents')

<div id="app">
    <div class="container">
        <h2>{{ $player->name }} SNS登録</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </div>
        @endif

            <form method="POST" action="/players/sns">
                @csrf
                <div class="mb-4">
                    <label for="twitter" class="form-label"><img width="32px" src="/img/icon/twitter.svg">　Twitter</label>
                    <input type="url" name="sns[Twitter]" class="form-control" id="twitter" placeholder="プロフィールURL" @isset($sns['Twitter']) value="{{ 'https://twitter.com/' . $sns['Twitter'] }}" @endisset>
                </div>
                <div class="mb-4">
                    <label for="instagram" class="form-label"><img width="32px" src="/img/icon/instagram.svg">　Instagram</label>
                    <input type="url" name="sns[Instagram]" class="form-control" id="instagram" placeholder="プロフィールURL" @isset($sns['Instagram']) value="{{ 'https://www.instagram.com/' . $sns['Instagram'] }}" @endisset>
                </div>
                <div class="mb-4">
                    <label for="youtube" class="form-label"><img width="32px" src="/img/icon/youtube.svg">　YouTube</label>
                    <input type="url" name="sns[YouTube]" class="form-control" id="youtube" placeholder="チャネルURL" @isset($sns['YouTube']) value="{{ 'https://www.youtube.com/channel/' . $sns['YouTube'] }}" @endisset>
                </div>
                <div class="form-floating">
                    @include('elements/r-capture')
                </div>
                <h5 style="margin:48px"></h5>

                <input type="submit" class="btn btn-success btn-lg" style="margin-right:40px">
                <a type="button" class="btn btn-outline-success btn-lg" href="/players/{{ $player->id }}">戻る</a>
                <input type="hidden" name="player_id" value="{{ $player->id }}">
            </form>
    </div>
</div>
@endsection
@section('script')

@endsection
