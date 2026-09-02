<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AirCare | ホテル空調清掃管理</title>
    <link rel="stylesheet" href="/css/app.css?v={{ filemtime(public_path('css/app.css')) }}">
</head>
<body>
    <header class="topbar">
        <a class="brand" href="{{ route('rooms.index') }}">
            <span class="brand-mark">✦</span>
            <span>AirCare <small>ホテル運営管理</small></span>
        </a>
        <span class="live-dot">清掃状況管理</span>
    </header>
    <main class="container">@yield('content')</main>
</body>
</html>
