@extends('layouts.default')
@section('title', $player->name . ' | 選手情報')
@section('description', sprintf( '%s, 生年月日%s, %s FINASH　女子サッカー情報サイト 選手情報', $player->display_name, $player->birthday, $player->info))
@section('keywords', sprintf( '%s, %s, FINASH,　女子サッカー情報サイト, 選手情報, 戦績, 成績', $player->name, $player->english))
@section('contents')

<div id="app">
    <players-detail
            :player='{{ $player }}' />
</div>
@endsection
@section('script')
@endsection
