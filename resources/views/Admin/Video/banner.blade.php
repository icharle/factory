@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加Banner</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            @foreach($videos as $video)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <iframe class="embed-responsive-item" src="https://v.qq.com/iframe/player.html?vid={{ $video->video }}&tiny=0&auto=0"></iframe>
                        <div class="caption">
                            <div>
                                <label>标题：</label>{{ $video->title }}
                            </div>
                            <div>
                                <label>作者：</label>{{ $video->author }}
                            </div>
                            <div>
                                <label>时间：</label>{{ $video->time }}
                            </div>
                            <div>
                                <label>描述：</label>{{ $video->description }}
                            </div>
                            <div>
                                <label>参演人员：</label>{{ $video->people }}
                            </div>
                            <p>
                                <a href="#" onclick="edit( {{ $video->id }} )" class="btn btn-info "
                                   data-toggle="modal" data-target="#myModal"
                                   role="button">编辑</a>
                                <a href="#" onclick="del( {{ $video->id }} )" class="btn btn-danger"
                                   role="button">删除</a>
                                <a href="#" onclick="use( {{ $video->id }} )" class="btn btn-success"
                                role="button">@if( $video['isshow'] == 1 )已启用@else启用@endif</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            添加Banner视频
                        </h4>
                    </div>
                    <form class="form-horizontal" role="form" action="{{ url('admin/VideoBanner') }}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="video" class="col-sm-2 control-label">视频：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="video" name="video"
                                           placeholder="q0025jank30">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="贺岁片">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="author" class="col-sm-2 control-label">作者：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="author" name="author"
                                           placeholder="文化传媒中心">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-sm-2 control-label">时间：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="time" name="time"
                                           placeholder="2018-02-28">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="people" class="col-sm-2 control-label">参演人员：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="people" name="people"
                                           placeholder="浩瀚">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">描述：</label>
                                <div class="col-sm-7">
                                <textarea class="form-control" id="description" name="description"
                                          placeholder="小星空，大梦想，加入我们快速成长"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                            </button>
                            <button type="submit" class="btn btn-primary">
                                提交
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        //编辑
        function edit(id) {
            $.ajax({
                type: 'get',
                url: "{{ url('admin/VideoBanner') }}" + '/' + id + '/edit',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.status == 200) {

                        //赋值
                        $('#video').val(data.video);
                        $('#title').val(data.title);
                        $('#author').val(data.author);
                        $('#time').val(data.time);
                        $('#people').val(data.people)
                        $('#description').val(data.description);
                    }
                }
            });
        }

        //删除
        function del(id) {
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/VideoBanner') }}" + '/' + id,
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

        //是否启用
        function use(id) {
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/VideoBanner/isUse') }}" + '/' + id,
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (data) {
                    if (data.status == 200) {
                        layer.msg('启用成功', {icon: 6});
                    } else if (data.status == 501) {
                        layer.msg('启用失败', {icon: 5});
                    } else if (data.status == 503) {
                        layer.msg('超过banner数限制', {icon: 5});
                    }
                }
            });
        }
    </script>
@endsection