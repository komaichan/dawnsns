<!-- ログイン後のフォルダに流用する用
※レイアウトファイルは基本流用用 -->


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>DAWNSNS</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <h1 class ="top-logo">
                <a href="/top"><img src="{{ asset('images/main_logo.png') }}"></a>
            </h1>
            <div id="user-menu">
                <div id="user">
                    <p class="name"><?php $user = Auth::user(); ?>{{ $user->username }} さん</p>

                    <div class="menu-trigger">
                        <span></span>
                        <span></span>
                    </div>
                    <img src="{{ asset('images/' . Auth::user()->images) }}">
                <div>
            </div>
        </div>
    </header>

        <nav class="user-nav">
            <div class="nav-wrapper">
                <ul>
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">ログアウト</a></li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </nav>

    <div id="row">
        <div id="container">
            @yield('content')
            <!-- index,search,followなどの内容が入る -->
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                <div class="follow">
                    <p>フォロー数</p>
                    <p>名</p>
                </div>
                    <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div class="follow">
                    <p>フォロワー数</p>
                    <p>名</p>
                </div>
                    <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn search-btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
