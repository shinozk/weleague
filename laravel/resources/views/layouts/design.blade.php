<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="@yield('keywords', '女子サッカー, なでしこリーグ, WEリーグ, サッカー, 選手名鑑, データベース')">
    <meta name="description" content="@yield('description', 'FINASH　女子サッカー情報サイト 選手情報、試合結果、圧倒的なデータ蓄積量！！なでしこリーグ、WEリーグを盛り上げましょう')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'FINASH 女子サッカー情報サイト | なでしこリーグ（WEリーグ） | TOP' )</title>
    <link rel="stylesheet" href="/css/design.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-inner">
            <h1>
                <a class="header-logo" href="/">FINASH</a>
            </h1>
        </div>
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <div class="menu-content">
                <ul>
                    <li>
                        <a href="/">TOP</a>
                    </li>
                    <li>
                        <a href="/news">News</a>
                    </li>

                    <li>
                        <a href="{{ route('players.index') }}">選手一覧</a>
                    </li>
                    <li>
                        <a href="/games">試合日程</a>
                    </li>
                    <li>
                        <a href="/leagues/weleague" class="list-group-item">We. League</a>
                    </li>
                    <li>
                        <a href="/leagues/nadeshiko1" class="list-group-item">なでしこリーグ1部</a>
                    </li>
                    <li>
                        <a href="/leagues/nadeshiko2" class="list-group-item">なでしこリーグ2部</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    @yield('contents')
    <footer>
        <div class="container">
            <div class="footer-inner">
                <div class="footer-top">
                    <a href="/">
                        <h2 class="footer-logo">
                            FINASH
                        </h2>
                    </a>
                    <div class="inquiry-form">
                        <a class="inquiry-item" href="https://docs.google.com/forms/d/e/1FAIpQLSc3sawUT1yK5LmCTsNCl9LjqTgW3OQeyG-ZlOO5bOE22SrJqQ/viewform">お問い合わせ</a>
                        <div class="partition">
                            <span></span>
                        </div>
                        <a class="inquiry-item" href="#">プライバシーポリシー</a>
                    </div>
                </div>
                <div>
                    <p class="copyright">&copy; 2014-2024 finash all rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    @yield('script')
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5493578155161487"
        crossorigin="anonymous"></script>
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-format="autorelaxed"
        data-ad-client="ca-pub-5493578155161487"
        data-ad-slot="3527284101"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    @vite(['resources/js/app.js'])
</body>

</html>