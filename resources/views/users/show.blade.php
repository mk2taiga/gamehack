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
                <button type="submit" class="btn btn-default">プロフィール編集</button>
            </div>
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#">投稿一覧</a></li>
                <li><a href="#">お気に入り一覧</a></li>
                <li><a href="#">フォロー</a></li>
                <li><a href="#">フォロワー</a></li>
            </ul>
        </div>
    </div>
@endsection