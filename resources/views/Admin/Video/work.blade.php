@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加作品</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            @foreach($videos as $video)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <iframe class="embed-responsive-item"
                                src="https://v.qq.com/iframe/player.html?vid={{ $video->video }}&tiny=0&auto=0"></iframe>
                        <div class="caption">
                            <div>
                                <label>类别：</label>@if( $video['sort'] == 0 )街坊@elseif( $video['sort'] == 1 )
                                    星空直播@elseif( $video['sort'] == 2 )其它@endif
                            </div>
                            <div>
                                <label>标题：</label>{{ $video->title }}
                            </div>
                            <div>
                                <label>作者：</label>{{ $video->author }}
                            </div>
                            <p>
                                {{--<a href="#" onclick="edit( {{ $video->id }} )" class="btn btn-info "--}}
                                   {{--data-toggle="modal" data-target="#myModal"--}}
                                   {{--role="button">编辑</a>--}}
                                <a href="javascript:void(0);" onclick="del( {{ $video->id }} )" class="btn btn-danger"
                                   role="button">删除</a>
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
                            添加作品
                        </h4>
                    </div>
                    <form class="form-horizontal" role="form" action="{{ url('admin/VideoWork') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="avatar" class="col-sm-2 control-label">链接：</label>
                                <div class="col-sm-7">
                                    <input type="video" class="form-control" id="video" name="video" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort" class="col-sm-2 control-label">分类：</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="sort" id="sort">
                                        <option value="0">街坊</option>
                                        <option value="1">星空直播</option>
                                        <option value="2">其它</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="xxx">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="author" class="col-sm-2 control-label">作者：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="author" name="author"
                                           placeholder="CEO">
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

        //删除实例
        function del(id) {
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/VideoWork') }}" + '/' + id,
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function (data) {
                    if (data.status == 200) {
                        layer.msg('删除成功', {icon: 6});
                        window.location.href = "{{ url('admin/VideoWork') }}";
                    } else if (data.status == 501) {
                        layer.msg('删除失败', {icon: 5});
                    }
                }
            });
        }


        //编辑
        function edit(id) {
            $.ajax({
                type: 'get',
                url: "{{ url('admin/VideoWork') }}" + '/' + id + '/edit',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.status == 200) {

                        //赋值
                        $('#video').val(data.video);
                        $('#title').val(data.title);
                        $('#author').val(data.author);
                        $('#sort').val(data.sort);
                    }
                }
            });
        }
    </script>
@endsection