<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-
avbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">GameHack</a>
                @if (Auth::check())
                <!--検索機能の部分-->
                <div class="navbar-form navbar-left" role="search">
                    {!! Form::open(['route' => ['tweets.search'], 'method' => 'get']) !!}
                        <div class="form-group">
                            {!! Form::text('keyword', null, ['class' => "form-control", 'placeholder' => "キーワードを入力"]) !!}
                        </div>
                        {!! Form::submit('検索', ['class' => "btn btn-default"]) !!}
                    {!! Form::close() !!}
                </div>
                <!--ここまで-->
                @endif
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>
                            <a href="{{ route('tweets.create') }}">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                投稿する
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    {!! link_to_route('users.show', 'マイページ', ['id' => Auth::user()->id]) !!}
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout.get') }}">ログアウト</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('signup.get') }}">新規登録</a></li>
                        <li><a href="{{ route('login.get') }}">ログイン</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>



