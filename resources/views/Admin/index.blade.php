<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>星空us | 后工坊</title>
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/styles.css') }}">

</head>

<body>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="javascript:sidebarNoneToggle()">管理后台</a>

        <ol id="navbar-router" class="navbar-text">
            <li>HOME</li>
        </ol>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-tool"
                aria-expanded="true" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div id="navbar-tool" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('admin/logout') }}">退出登录</a></li>
        </ul>
    </div>
</div>

<div id="sidebar" class="sidebar sidebar-default sidebar-fixed-left">
    <div class="sidebar-toggle">
        <button onClick="sidebarSimpleToggle()" class="btn btn-xs btn-success"><span
                    class="glyphicon glyphicon-chevron-left"></span></button>
    </div>

    <div id="sidebar-accordion" class="sidebar-accordion">
        <ul class="nav sidebar-nav">
            <li class="active">
                <a href="#nav-homeinfo" data-toggle="collapse" aria-expanded="false" aria-controls="nav-homeinfo">
                    <i class="glyphicon glyphicon-home"></i><span>三大中心</span>
                </a>
                <ul id="nav-homeinfo" class="nav collapse">
                    <li><a href="{{ url('admin/CenterBanner') }}"><span>Banner管理</span></a></li>
                    <li><a href="{{ url('admin/CenterProduction') }}"><span>作品管理</span></a></li>
                    <li><a href="{{ url('admin/CenterAct') }}"><span>活动记录</span></a></li>
                    <li><a href="{{ url('admin/CenterWork') }}"><span>工作记录</span></a></li>
                    <li><a href="{{ url('admin/CenterWechat') }}"><span>微信推文</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#nav-basicinfo" data-toggle="collapse" aria-expanded="false" aria-controls="nav-basicinfo">
                    <i class="glyphicon glyphicon-cog"></i><span>组织风貌</span>
                </a>
                <ul id="nav-basicinfo" class="nav collapse">
                    <li><a href="{{ url('admin/StyleBanner') }}"><span>Banner管理</span></a></li>
                    <li><a href="{{ url('admin/StyleAct') }}"><span>活动记录</span></a></li>
                    <li><a href="{{ url('admin/StyleHis') }}"><span>星空人去向</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#nav-shopinfo" data-toggle="collapse">
                    <i class="glyphicon glyphicon-asterisk"></i><span>组织视频</span>
                </a>
                <ul id="nav-shopinfo" class="nav collapse">
                    <li><a href="{{ url('admin/VideoBanner') }}"><span>Banner管理</span></a></li>
                    <li><a href="{{ url('admin/VideoWork') }}"><span>作品管理</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="page">
    @yield('content')
</div>

<!-- Bootstrap JavaScript -->
<script type="text/javascript" src="{{ asset('js/home/jquery-3.2.0.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<script type="text/javascript">
    initSidebarAccordion();
    initSidebarAccordionStyle();

    /* 初始化工具栏菜单单击事件 */
    function initSidebarAccordion() {
        var $accordion = $('#sidebar-accordion'), $router = $('#navbar-router');
        $accordion.find('li > a').click(function (e) {
            // 有子项时不执行任何操作
            if ($(this).siblings('ul').length > 0) return;

            // 添加active样式
            $(this).parents('.sidebar-nav li').siblings('li').removeClass('active');
            $(this).parents('.sidebar-nav li').addClass('active');

            // 更新router内容
            var routerContent = '';
            $(this).parents('.sidebar-nav li').each(function (index, ele) {
                routerContent = '<li>' + ele.children[0].outerText + '</li>' + routerContent;
            });
            $router.html(routerContent);
        });
    }

    /* 隐藏工具栏 */
    function sidebarNoneToggle() {
        $sidebar = $('#sidebar');
        if ($sidebar.hasClass("sidebar-none")) {
            $sidebar.removeClass("sidebar-none");
        } else {
            $sidebar.addClass("sidebar-none")
        }
    }

    /* 简版工具栏 */
    function sidebarSimpleToggle() {
        $sidebar = $('#sidebar');
        $sidebar.removeClass("sidebar-none");
        if ($sidebar.hasClass("sidebar-simple")) {
            $sidebar.removeClass("sidebar-simple");
        } else {
            $sidebar.addClass("sidebar-simple")
        }
        initSidebarAccordionStyle();
    }

    /* 初始化工具栏菜单样式 */
    function initSidebarAccordionStyle() {
        $sidebar = $('#sidebar'), $accordion = $('#sidebar-accordion');
        if ($sidebar.hasClass("sidebar-simple")) {
            $accordion.find('a').each(function (index, ele) {
                if (ele.dataset.toggle) {
                    $(ele).siblings('ul').collapse('hide');
                    ele.hrefbak = ele.href;
                    ele.href = undefined;
                    ele.style.cursor = 'default'
                }
            });
        } else {
            $accordion.find('a').each(function (index, ele) {
                if (ele.dataset.toggle) {
                    if (ele.hrefbak) ele.href = ele.hrefbak;
                    ele.style.cursor = 'pointer';
                    if ($(ele).parent('li').hasClass('active')) {
                        $(ele).siblings('ul').collapse('show');
                    }
                }
            });
        }
    }

</script>
</body>
</html>
