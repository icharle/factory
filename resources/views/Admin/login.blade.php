<!doctype html>
<html>
<head>
    <title>星空us | 后工坊</title>
    <link href="{{ ('css/index.css') }}" rel="stylesheet" type="text/css" media="all">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="星空 星空us 小星空 大梦想 加入我们快速成长"/>
</head>

<body>
<div class="login">
    <img src="{{ ('img/logo.png') }}" style="position:relative;left: 50% ;margin-left:-75px">
    <div class="login-top">
        <h1>管理员登录</h1>
        @if(Session::has('error'))
            <div class="login-error">
                {{ Session::get('error') }}
            </div>
        @endif
        <form method="post" action="{{url('admin/logincheck')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input name="username" type="text" placeholder="管理员账号">
            <input name="password" type="password" placeholder="管理员密码">
            <div class="forgot">
                <a href="#">忘记密码</a>
                <input type="submit" value="登录">
            </div>
        </form>
    </div>
    <div class="login-bottom">
        <h3>新用户 &nbsp;<a href="#">注册</a>&nbsp 这里</h3>
    </div>
</div>

<div class="copyright">
    <p>Copyright &copy; 2006-2018. <a href="http://www.xingkong.us" target="_blank">星空学生创新中心</a></p>
</div>
</body>
</html>