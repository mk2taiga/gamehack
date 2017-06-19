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
        <div class="favorite-button-bottom">
            @include('user_favorite.favorite_button', ['tweet' => $tweet])
        </div>
        <!--削除ボタン-->
        <div class="delete-button-tweet">
            @if (Auth::user()->id == $tweet->user_id)
                {!! Form::open(['route' => ['tweets.destroy', $tweet->id], 'method' => 'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
    <!--コメントの一覧-->
    <div class="row">
        <div class="col-xs-9">
            <div class="comment-index-box">
                @if (count($comments) > 0)
                    @include('comments.comments', ['comments' => $comments])
                @endif
            </div>
        </div>
    </div>
    <!--コメントのビュー-->
    <div class="row">
        <div class="col-xs-9">
            <div class="comment-box">
                <div class="comment-box-inner">
                    <?php $auser = Auth::user() ?>
                    <a href="{{ route('users.show', ['id' => $auser->id]) }}">
                        <img class="media-object img-rounded show_tweet" src="{{ Gravatar::src($auser->email, 40) . '&d=mm' }}" alt="">
                        {{ $auser->name }}
                    </a>
                    {!! Form::open(['route' => 'comments.store']) !!}
                        <div class="form-group">
                            {!! Form::textarea('content', old('content'), ['placeholder' => 'コメントを入力してください', 'class' => 'form-control', 'rows' => '5']) !!}
                        </div>
                        {!! Form::hidden('tweet_id', $tweet->id) !!}
                        {!! Form::submit('コメントを送信', ['class' => 'btn btn-hack']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection