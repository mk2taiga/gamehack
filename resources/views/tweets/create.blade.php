@extends('layouts.app')

@section('content')
    {!! Form::model($tweet, ['route' => 'tweets.store']) !!}
        <div class="form-group form-midle">
            {!! Form::text('title', null, ['placeholder' => 'タイトル', 'class' => 'form-control input-lg']) !!}
        </div> 
        <div class="form-group form-mini">
            {!! Form::text('game_name', null, ['placeholder' => '記事にする記事にするゲームのタイトル', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('content', null, ['placeholder' => 'Markdown記法でゲームの知識を共有しよう', 'class' => 'form-control', 'rows' => '30']) !!}
        </div>
        <div class="button-point">
            {!! Form::submit('GameHackに投稿', ['class' => 'btn btn-hack']) !!}
        </div>
    {!! Form::close() !!}
@endsection