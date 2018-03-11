@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">已启用列表</h3>
        <div class="row">
            @foreach($wechats as $wechat)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $wechat->save_file }}">
                        <div class="caption">
                            <div>
                                <label>时间：</label><?php echo date('Y-m-d H:i:s', $wechat->time); ?>
                            </div>
                            <div>
                                <label>标题：</label><a target="_blank" href="{{ $wechat->url }}">{{ $wechat->title }}</a>
                            </div>
                            <div>
                                <label>作者：</label>{{ $wechat->author }}
                            </div>
                            <p>
                                <a href="#" onclick="del( {{ $wechat->id }} )" class="btn btn-danger"
                                   role="button">删除</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h3 class="page-header">列表</h3>
        <div class="container" align="center">
            <div class="progress" style="width: 40%">
                <p class="bg-info">正在加载,请稍等......</p>
            </div>
            <div class="progress" style="width: 40%">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>

            <!-- 列出所有文章 -->
        </div>


        <script type="text/javascript">


            var page = ( {{$page}} -1 ) * 13;       //动态页数  默认第一页
            var article = '';                       //存储ajax数据，方便后面使用存库处理
            window.onload = function () {
                getActicle(page, 12);
            };

            //遍历出微信文章
            function edit(data) {
                var html = '';
                for (var i = 1; i <= Object.keys(data).length; i++) {

                    if (data[i]['author'] == '') {
                        data[i]['author'] = "暂无作者";
                    }

                    html = html + '<div class="col-md-2 text-center well"><a href=" ' + data[i].url + ' "><img width="140px" height="140px" src=" ' + data[i].thumb_url + ' "><h5 class="text-muted text-primary text-center"> + ' + data[i].title + ' + </h5><h6> + ' + data[i].author + ' </h6><h6> + ' + getLocalTime(data[i].update_time) + ' + </h6></a>';

//                    html = html + '<button class="btn btn-success" onclick=use("' + data[i].url + '","' + data[i].author + '","' + data[i].update_time + '")>使用</button></div>';
                    html = html + '<button class="btn btn-success" onclick=use("' + i + '")>使用</button></div>';

                    if (i == 6) {
                        html = html + '</div><div class="row">';
                    }

                }
                html = html + '</div><div class="row"><div class="col-md-12 text-center"><nav><ul class="pager"><li><a href="{{ url('admin/CenterWechat') }}?page=' + ({{$page}} -1) + '">上一页</a></li><li><a href="{{ url('admin/CenterWechat') }}?page=' + ({{$page}} +1) + '">下一页</a></li></ul></nav></div></div>';
                $('.container').append(html);
            }

            //时间戳转换Y-M-D
            function getLocalTime(nS) {
                return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/, ' ');
            }

            //获取文章
            function getActicle(offest, count) {
                $.ajax({
                    url: 'http://xingkong.soarteam.cn/xingkong/index.php/Home/Index/getNews', // 跳转到 action
                    type: 'get',
                    timeout: 1000, //超时时间设置，单位毫秒
                    data: {
                        'offset': offest,//偏移量
                        'count': count  //数量
                    },
                    crossDomain: true,
                    dataType: 'jsonp',
                    jsonpCallback: "jsonpHandler",
                    success: function (data) {
                        console.log(data);
                        $(".progress").css('display', 'none');
                        edit(data);
                        article = data;
                    },
                    error: function () {
                        console.log("失败了");
                    }
                });
            }


            //使用按钮的操作
            function use(id) {
                for (var i = 1; i <= Object.keys(article).length; i++) {
                    if (id == i) {
                        $.ajax({
                            type: 'post',
                            url: "{{ url('admin/CenterWechat') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                url: article[id].url,
                                thumb_url: article[id].thumb_url,
                                title: article[id].title,
                                author: article[id].author,
                                time: article[id].update_time
                            },
                            success: function (data) {
                                if (data.status == 200) {

                                }
                            }
                        });
                    }
                }
            }


            function del(id) {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/CenterWechat') }}" + '/' + id,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function (data) {
                        if (data.status == 200) {
                            layer.msg('删除成功', {icon: 6});
                        } else if (data.status == 501) {
                            layer.msg('删除失败', {icon: 5});
                        }
                    }
                });
            }

        </script>

@endsection