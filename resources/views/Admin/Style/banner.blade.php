@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加Banner</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            @foreach($banners as $banner)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $banner->picurl }}">
                        <div class="caption">
                            <div>
                                <label>中心：</label>{{ $banner->center }}
                            </div>
                            <div>
                                <label>方向：</label>{{ $banner->direction }}
                            </div>
                            <div>
                                <label>时间：</label>{{ $banner->time }}
                            </div>
                            <div>
                                <label>描述：</label>{{ $banner->description }}
                            </div>
                            <p>
                                <a href="#" onclick="edit( {{ $banner->id }} )" class="btn btn-info "
                                   data-toggle="modal" data-target="#myModal"
                                   role="button">编辑</a>
                                <a href="#" onclick="del( {{ $banner->id }} )" class="btn btn-danger"
                                   role="button">删除</a>
                                <a href="#" onclick="use( {{ $banner->id }} )" class="btn btn-success"
                                   role="button">@if( $banner['isshow'] == 1 )已启用@else启用@endif</a>
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
                            添加星人
                        </h4>
                    </div>
                    <form class="form-horizontal" role="form" action="{{ url('admin/StyleBanner') }}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="banner" class="col-sm-2 control-label">图片：</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" id="banner" name="banner">
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
                                <label for="center" class="col-sm-2 control-label">中心：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="center" name="center"
                                           placeholder="技术研发中心">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="direction" class="col-sm-2 control-label">方向：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="direction" name="direction"
                                           placeholder="Android">
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
                url: "{{ url('admin/StyleBanner') }}" + '/' + id + '/edit',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.status == 200) {

                        //赋值
                        $('#picurl').val(data.picurl);
                        $('#time').val(data.time);
                        $('#center').val(data.center);
                        $('#direction').val(data.direction);
                        $('#description').val(data.description);
                    }
                }
            });
        }

        //删除
        function del(id) {
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/StyleBanner') }}" + '/' + id,
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
                url: "{{ url('admin/StyleBanner/isUse') }}" + '/' + id,
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