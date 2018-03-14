@extends('Home.common.layout')

@section('title', '组织视频')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/gobal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/classify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/actshow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/footer.css') }}">
    <script type="text/javascript" src="{{ ('js/home/jquery-3.2.0.js') }}"></script>
@endsection

@section('content')
    <article>
        <section>
            <div class="actshow">
                <div class="stage" id="stage">
                    <iframe class="video_iframe" src="" allowfullscreen="" frameborder="0" ></iframe>
                </div>
                <div class="actinfor">
                    <p class="actname"></p>
                    <div class="infor-2">
                        <p class="actauthor"></p>
                        <p class="acttime"></p>
                    </div>
                    <p class="people infor-2"></p>
                    <p class="illstration"></p>
                </div>
            </div>
            <div class="classify">
                <div class="guide">
                    <p class="heading">作品分类</p>
                    <div class="category" id="category"></div>
                    <!-- <div class="search">
                        <input type="" name="">
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
                <div class="more" id="more">更多>>></div>
            </div>
        </section>
        <aside class="little">
            <div class="skip skip-1">
                <a href="#">
                    <p class="headline">街坊</p>
                    <p class="sub_headline">STREET INTERVIEW</p>
                </a>
            </div>
            <div class="skip skip-2">
                <a href="#">
                    <p class="headline">星空直播</p>
                    <p class="sub_headline">XINGKONG LIVE</p>
                </a>
            </div>
            <div class="skip skip-3">
                <a href="#">
                    <p class="headline">其他</p>
                    <p class="sub_headline">OTHER</p>
                </a>
            </div>
        </aside>
    </article>

    <script type="text/javascript">
        var API_URL = '{{ url('api/zzsp') }}';
        $.ajax({
            url: API_URL,
            type: 'post',
            async: false,
            success: function(res) {
                show = res.show;
                classify = res.classify;
                classifyname = res.classifyname;
            },
            dataType: "json"
        });

        function putclassify(){
            return classify;
        }

        $('.video_iframe').attr('src',show[0].src);
        $(".actname").text(show[0].name);
        $(".actauthor").text(show[0].author);
        $(".acttime").text(show[0].time);
        $(".people").text(show[0].people);
        $(".illstration").text(show[0].text);

    </script>
@endsection

@section('js')
    <script type="text/javascript" src="{{ ('js/home/common.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/classify.js') }}"></script>
@endsection