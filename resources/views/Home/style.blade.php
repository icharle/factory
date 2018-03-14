@extends('Home.common.layout')

@section('title', '组织风貌')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/gobal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/actshow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/record.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/graduated.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ ('css/home/footer.css') }}">
    <script type="text/javascript" src="{{ ('js/home/jquery-3.2.0.js') }}"></script>
@endsection

@section('content')
    <article>
        <section>
            <div class="actshow">
                <div class="stage" id="stage">
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
            <div class="record activity">
                <div class="line" id="line"></div>
                <div class="formhead">活动记录</div>
                <div class="recordshow" id="acrecordshow"></div>
            </div>
            <div class="graduated">
                <div class="line" id="line"></div>
                <div class="formhead">星空人毕业去向</div>
                <div class="graduatedshow" id="graduatedshow"></div>
            </div>
        </section>
        <aside class="little">
            <div class="skip skip-1">
                <a href="#">
                    <p class="headline">集体合照</p>
                    <p class="sub_headline">WHAT WE LEAVE</p>
                </a>
            </div>
            <div class="skip skip-2">
                <a href="#">
                    <p class="headline">活动记录</p>
                    <p class="sub_headline">WHAT WE DO</p>
                </a>
            </div>
            <div class="skip skip-3">
                <a href="#">
                    <p class="headline">毕业去向</p>
                    <p class="sub_headline">WHERE WE GO</p>
                </a>
            </div>
        </aside>
    </article>

    <script type="text/javascript">
        var API_URL = '{{ url('api/zzfm') }}';
        $.ajax({
            url: API_URL,
            type: 'post',
            async: false,
            success: function(res) {
                show = res.show;
                xkmandata = res.xkmandata;
                activityrecord = res.activityrecord;
                workrecord = res.workrecord;
            },
            dataType: "json"
        });
    </script>
@endsection


@section('js')
    <script type="text/javascript" src="{{ ('js/home/common.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/lunbo.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/actshow.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/record.js') }}"></script>
    <script type="text/javascript" src="{{ ('js/home/xkman.js') }}"></script>
@endsection