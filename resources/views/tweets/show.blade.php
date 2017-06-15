@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class = "container">
            <div class="cover-inner">
                <div class="cover-contents">
                    <h1>{{ $tweet->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="well well-sm clearfix">
        <div class="container">
            <a href="{{ route('users.show', ['id' => $user->id]) }}">
                <img class="media-object img-rounded show_tweet" src="{{ Gravatar::src($user->email, 20) . '&d=mm' }}" alt=""><p class="show_tweet_text show_tweet">{{ $user->name }} <span class="text-muted">posted at {{ $tweet->created_at }}</span></p>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-box">
        <p class="show_tweet_content">{{ $tweet->content }}</p>
    </div>
    <div class="comment-box">
        <div class="comment-box-inner">
            <?php $auser = Auth::user() ?>
            <a href="{{ route('users.show', ['id' => $auser->id]) }}">
                <img class="media-object img-rounded show_tweet" src="{{ Gravatar::src($auser->email, 40) . '&d=mm' }}" alt="">
                {{ $auser->name }}
            </a>
            {!! Form::open(['route' => 'tweets.store']) !!}
                <div class="form-group">
                    {!! Form::textarea('comment', old('comment'), ['placeholder' => 'コメントを入力してください', 'class' => 'form-control', 'rows' => '5']) !!}
                </div>
                {!! Form::submit('コメントを送信', ['class' => 'btn btn-hack']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection