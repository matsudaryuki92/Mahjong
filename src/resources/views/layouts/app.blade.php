<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>雀荘マップ</title>
</head>

<body>
    <div class="header">
        <a href="{{ route('mahjong.index') }}" class="header-logo">
            <h1>雀荘マップ</h1>
        </a>
        <div class="header-auth">
            @if (Auth::check())
            <form action="/logout" method="POST">
                @csrf
                <button class="auth-button">ログアウト</button>
            </form>
            @endif
            <a href="/register" class="auth-button">会員登録</a>
            <a href="/login" class="auth-button">ログイン</a>
        </div>
    </div>
    @yield('content')
</body>

</html>