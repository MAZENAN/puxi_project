<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/home/favicon.ico" type="image/x-icon" />
@yield('headerlink')
@yield('style')
</head>
<body>
@yield('main')
<script src="/home/js/jquery-3.3.1.js"></script>
@yield('js')
</body>
</html>