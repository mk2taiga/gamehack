@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="container">
            <div class="welcome_contents">
                <h3>ゲーム知識を共有しよう</h3>
                <a href="{{ route('tweets.create') }}" class="btn btn-hack">ノウハウ・Tipsを共有しよう</a>
            </div>
            <ul class="nav nav-tabs welcome_tabs">
              <li role="presentation" class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">全ての投稿</a></li>
              <li role="presentation" class="{{ Request::is('tweets') ? 'active' : '' }}"><a href="{{ route('tweets.index') }}">タイムライン</a></li>
            </ul>
            <?php $user = Auth::user(); ?>
            @if (count($tweets) > 0 )
                @include('tweets.tweets', ['tweets' => $tweets])
            @endif
        </div>
    @endif
@endsection