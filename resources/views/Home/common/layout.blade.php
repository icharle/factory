<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | 后工坊-星空学生创新中心</title>
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/gobal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/actshow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/record.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/graduated.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/footer.css') }}">
    <script type="text/javascript" src="{{ ('js/admin/jquery.min.js') }}"></script>
</head>
<body>
    @include('Home.common.header')
    @yield('content')
    @include('Home.common.footer')

    <script type="text/javascript" src="{{ ('js/home/lunbo.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/actshow.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/record.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/xkman.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/common.js') }}"></script>
</body>
</html>