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
            <li><a href="#/logout">退出登录</a></li>
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
                <a href="#/home">
                    <i class="glyphicon glyphicon-home"></i><span>HOME</span>
                </a>
            </li>
            <li>
                <a href="#nav-basicinfo" data-toggle="collapse" aria-expanded="false" aria-controls="nav-basicinfo">
                    <i class="glyphicon glyphicon-cog"></i><span>组织风貌</span>
                </a>
                <ul id="nav-basicinfo" class="nav collapse">
                    <li><a href="#/basicinfo/user"><span>用户管理</span></a></li>
                    <li><a href="#/basicinfo/role"><span>星空人去向</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#nav-shopinfo" data-toggle="collapse">
                    <i class="glyphicon glyphicon-asterisk"></i><span>商家信息</span>
                </a>
                <ul id="nav-shopinfo" class="nav collapse">
                    <li><a href="#/shopinfo/shop"><span>商家管理</span></a></li>
                    <li><a href="#/shopinfo/shopproduct"><span>商品管理</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="page">
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加活动记录</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <img src="http://kidultyx.com/factory_2018/image/item1.png">
                    <div class="caption">
                        <div>
                            <label>时间：</label>2018-04-03
                        </div>
                        <div>
                            <label>标题：</label>技术研发中心
                        </div>
                        <div>
                            <label>描述：</label>技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心
                        </div>
                        <p>
                            <a href="#" class="btn btn-info " data-toggle="modal" data-target="#myModal"
                               role="button">编辑</a>
                            <a href="#" class="btn btn-danger" role="button">删除</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            添加活动记录
                        </h4>
                    </div>
                    <form class="form-horizontal" role="form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="pic" class="col-sm-2 control-label">图片：</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" id="pic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-sm-2 control-label">时间：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="time" placeholder="2018-04-03">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="title" placeholder="技术研发中心">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">描述：</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" id="description"
                                              placeholder="技术研发中心技术研发中心技术研发中心"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                            </button>
                            <button type="button" class="btn btn-primary">
                                提交
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript -->
<script type="text/javascript" src="{{ asset('js/admin/jquery.min.js') }}"></script>
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
