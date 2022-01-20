<html lang="ja">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('js/app.js') }}">
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
</head>

<body>
<header>

</header>

<section>
    @yield('content')
</section>

<footer>

</footer>
</body>
</html>
