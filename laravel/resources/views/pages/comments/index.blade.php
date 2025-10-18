@extends('layouts.default')
@section('title', $model->name . ' | コメント')
@section('description', sprintf('%s, 掲示板　女子サッカー情報サイト コメント', $model->name))
@section('keywords', sprintf('%s, コメント,　女子サッカー情報サイト, 掲示板, 戦績, 成績', $model->name))
@section('contents')


<div id="app">
  <div class="container">
    <a href="/{{ $mode->value }}/{{ $id }}">{{ $model->name }}情報</a>
    <div class="row">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Top</a></li>
          @if ($mode === \App\Enums\Comment::Players)
          <li class="breadcrumb-item"><a href="{{ route('players.index') }}">選手一覧</a></li>
          @endif
          <li class="breadcrumb-item active">{{ $model->name }}</li>
        </ol>
      </nav>
    </div>
    <p></p>
    <h2>コメント({{ $list->total() }})件</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </div>
    @endif

    <form method="POST" action="/comments/{{ $model->value }}/{{ $model->id }}">
      @csrf

      <div class="form-floating">
        <textarea name="body" class="form-control" placeholder="コメントする" rows="3" maxlength="500"></textarea>
        <small>500文字以内</small>
      </div>
      <h5 style="margin:48px"></h5>
      <div class="form-floating">
        @include('elements/r-capture')
      </div>
      <h5 style="margin:48px"></h5>

      <input type="submit" class="btn btn-success btn-lg" style="margin-right:48px">
      <a type="button" class="btn btn-outline-success btn-lg" href="/{{ $model->value }}/{{ $model->id }}">戻る</a>
      <input type="hidden" name="relation_id" value="{{ $model->id }}">
      <input type="hidden" name="mode" value="{{ $model->value }}">
    </form>

    <h5 style="margin:48px"></h5>

    @if ($list->total())
    <div>
      @foreach ($list as $row)
      <div>
        <small>{{ $row->code }}</small>
      </div>
      <div class="card" style="width: 100%;">
        <div class="card-body" style="width: 100%;">
          <pre class="card-text" rows="3" maxlength="500">{{ $row->body }}</pre>
          <small>{{ $row->display_created_at }}</small>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="card">
      <pre style="text-align:center">
            コメントが１件もありません！
          </pre>
    </div>
    @endif
  </div>
</div>
@endsection
@section('script')


@endsection