@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="user-profile">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $user->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) .'&d=mm' }}" alt="">
                    </div>
                </div>
                @include('user_follow.follow_button', ['user' => $user])
                @if (Auth::user()->id == $user->id)
                    <button type="submit" class="btn btn-default">プロフィール編集</button>
                @endif
            </div>
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">投稿一覧 <span class="badge">{{ $count_tweets }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}"><a href="{{ route('users.favoritings', ['id' => $user->id]) }}">お気に入り一覧 <span class="badge">{{ $count_favoritings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">フォロー <span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">フォロワー <span class="badge">{{ $count_followers }}</span></a></li>
            </ul>
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection