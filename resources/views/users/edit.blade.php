@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">プロフィール編集</div>
            <div class="panel-body">
                {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'ユーザーネーム') !!}
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-right">
                        {!! Form::submit('送信', ['class' => 'btn btn-hack']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection