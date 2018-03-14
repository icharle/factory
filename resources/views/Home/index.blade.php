<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页|星空作品后工坊</title>

    <link rel="stylesheet" type="text/css" href="{{ ('css/home/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/footer.css') }}">
</head>
<body>
<header class="home">
    <a href="http://www.xignkong.us" class="ushref"></a>
    <nav id="nav">
        <a href="{{ url('/') }}" class="homebutton">首页</a>
    </nav>
</header>

<div class="banner">
    <div id="picList">
        <a href="javascript:void(0);" class="bannerpic pic1"></a>
    </div>
</div>

<article>
    <section>
        <a href="{{ url('center') }}" id="sdzx" class="first first-1">三大中心</a>
    </section>
    <section>
        <a href="{{ url('style') }}" id="zzfm" class="first first-2">组织风貌</a>
    </section>
    <section>
        <a href="{{ url('video') }}" id="zzsp" class="first first-3">组织视频</a>
    </section>
    <section>
        <a href="{{ url('style') }}" class="second-1 second">集体合照</a>
    </section>
    <section>
        <a href="{{ url('style') }}" class="second-2 second">活动记录</a>
    </section>
    <section>
        <a href="{{ url('style') }}" class="second-3 second">星空人毕业去向</a>
    </section>
</article>

<footer class="homefoot">
    <div class="uslogo"></div>
    <div class="copyright">
        <p>华南理工大学广州学院行政楼801</p>
        <p>星空学生创新中心 | Copyright&copy2006-2018</p>
    </div>
</footer>

<script type="text/javascript" src="{{ ('js/admin/jquery.min.js') }}"></script>
</body>
</html>