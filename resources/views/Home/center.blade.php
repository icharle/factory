@extends('Home.common.layout')

@section('title', '三大中心')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/gobal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/classify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/actshow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/record.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/sdzx.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/footer.css') }}">
    <script type="text/javascript" src="{{ ('js/home/jquery-3.2.0.js') }}"></script>
@endsection

@section('content')
    <div class="temporary">
        <div class="turnapart" id="turnapart" apartment="js">
            <div class="apartment" id="js">技术研发中心</div>
            <div class="apartment middle" id="cm">文化传媒中心</div>
            <div class="apartment" id="yc">运营策划中心</div>
        </div>
    </div>

    <article style="padding: 0;">
        <section>
            <div class="actshow" id="actshow">
                <div class="stage" id="stage" style="margin: 0 0 0 -2%;">
                    <div class="choose">
                        <ul class="singledots" id="singledots"></ul>
                    </div>
                    <div class="single" id="single" page="1"></div>
                </div>
                <div class="actinfor">
                    <p class="actname"></p>
                    <div class="infor-2">
                        <p class="actauthor"></p>
                        <p class="acttime"></p>
                    </div>
                    <p class="illstration"></p>
                </div>
            </div>
            <div class="classify">
                <div class="guide">
                    <p class="heading">作品分类</p>
                    <div class="category" id="category">
                    </div>
                    <!-- 		<div class="search">
                                <input type="" name="" placeholder="搜你喜欢的">
                            </div> -->
                </div>
                <div class="simple" id="simple" classify="0" page="1">
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                    <div class="simpleitem">
                        <div class="content"></div>
                        <div class="iteminfor">
                            <p class="itemname"></p>
                            <p class="itemauthor"></p>
                        </div>
                    </div>
                </div>
                <div class="more" id="more">
                    <a href="javascript:void(0);">更多>>></a>
                </div>
            </div>
            <div class="record activity">
                <div class="line" id="line"></div>
                <div class="formhead">活动记录</div>
                <div class="recordshow" id="acrecordshow"></div>
            </div>
            <div class="record work">
                <div class="line" id="line"></div>
                <div class="formhead">工作记录</div>
                <div class="recordshow" id="worecordshow"></div>
            </div>
        </section>
        <aside>
            <div class="skip skip-1">
                <a href="#actshow">
                    <p class="headline">作品展示</p>
                    <p class="sub_headline">WHAT WE FINISH</p>
                </a>
            </div>
            <div class="skip skip-2">
                <a href=".activity">
                    <p class="headline">活动记录</p>
                    <p class="sub_headline">WHAT WE DO</p>
                </a>
            </div>
            <div class="skip skip-3">
                <a href=".work">
                    <p class="headline">工作记录</p>
                    <p class="sub_headline">WHERE WE WORK</p>
                </a>
            </div>
        </aside>
    </article>

@endsection

@section('js')
    <script type="text/javascript" src="{{ ('js/home/common.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/sdzx.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/classify.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/lunbo.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/actshow.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/record.js') }}"></script>
@endsection