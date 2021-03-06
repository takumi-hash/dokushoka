<header>
        <nav class="navbar navbar-expand-md navbar-light bg-white navbar-extend">
            <div class="container">
                <a class="navbar-brand font-weight-light" href="{{ url('/') }}">
                    <i class="far fa-bookmark"></i>
                    {{ config('app.name', 'DOKUSHOKA') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    {{--{!! Form::open(['route' => 'posts.store'], ['class'=>'form-inline my-2 my-lg-0']) !!}
                        {!! Form::input('q_title', q_title, ['class' => 'form-control mr-sm-2', 'id'=>'q_title', 'placeholder'=>'Markdown記法を使えます。']) !!}
                        {!! Form::submit('検索', ['class' => 'btn btn-outline-success my-2 my-sm-0']) !!}
                    {!! Form::close() !!}--}}
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('timeline') }}">タイムライン</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.create') }}">本を検索</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Ranking <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('ranking.have') }}">読んだ！ランキング</a>
                                    <a class="dropdown-item" href="{{ route('ranking.want') }}">いいね！数ランキング</a>
                                    <a class="dropdown-item" href="{{ route('users.index') }}">ユーザーランキング</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">マイページ</a>
                                    <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">プロフィール設定</a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
</header>
