@extends('layouts.default')
@section('title', 'SNS登録情報')
@section('description', 'We League, なでしこリーグの選手のSNS一覧　女子サッカー選手')
@section('keywords', 'FINASH, 女子サッカー情報サイト, SNS, Twitter, Instagram, YouTube')
@section('contents')

<div id="app">
    <div class="container">
      <div class="row">
        <h1>SNS登録情報</h1>
        <table class="table table-bordered">
          <tr>
            <th>名前</th>
            <th>アカウント</th>
          </tr>
          @foreach ($list as $row)
          <tr>
            <td><a href="/players/{{ $row->player_id }}">{{ $row->name }}</a></td>
            <td>
              @foreach ($row->sns as $sns => $code)
                @switch($sns)
                    @case('Twitter')
                        <a href="https://twitter.com/{{ $code }}"><img width="32px" src="/img/icon/twitter.svg"></a>
                        @break
                    @case('Instagram')
                        <a href="https://instagram.com/{{ $code }}"><img width="32px" src="/img/icon/instagram.svg"></a>
                        @break
                    @case('YouTube')
                        <a href="https://youtube.com/channel/{{ $code }}"><img width="32px" src="/img/icon/youtube.svg"></a>
                        @break
                    @default
                @endswitch
                &nbsp;
              @endforeach
            </td>
          </tr>
          @endforeach
        </table>
        {{ $paginate->links() }}
      </div>
    </div>
</div>
@endsection
@section('script')

@endsection
