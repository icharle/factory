@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加工作记录</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            @foreach($works as $key=>$work)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $picurl[$key] }}">
                        <div class="caption">
                            <div>
                                <label>类别：</label>@if( $work['sort'] == 0 )技术研发中心@elseif( $work['sort'] == 1 )
                                    文化传媒中心@elseif( $work['sort'] == 2 )运营策划中心@endif
                            </div>
                            <div>
                                <label>时间：</label>{{ $work->time }}
                            </div>
                            <div>
                                <label>标题：</label>{{ $work->title }}
                            </div>
                            <div>
                                <label>描述：</label>{{ $work->description }}
                            </div>
                            <p>
                                <a href="#" class="btn btn-info " data-toggle="modal" data-target="#myModal"
                                   role="button">编辑</a>
                                <a href="#" onclick="del( {{ $work->id }} )" class="btn btn-danger"
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
                            添加工作记录
                        </h4>
                    </div>
                    <form class="form-horizontal" role="form" action="{{ url('admin/CenterWork') }}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="pic" class="col-sm-2 control-label">图片：</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" id="pic" name="picurl[]">
                                    <button type="button" class="btn btn-primary" onclick="addInput(this)"><span
                                                class="glyphicon glyphicon-plus"></span></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-sm-2 control-label">时间：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="time" name="time"
                                           placeholder="2018-04">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="技术研发中心">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort" class="col-sm-2 control-label">类别：</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="sort" id="sort">
                                        <option value="0">技术研发中心</option>
                                        <option value="1">文化传媒中心</option>
                                        <option value="2">运营策划中心</option>
                                    </select>
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

        //添加上传框
        function addInput(obj) {
            html = '<input type="file" class="form-control" id="pic" name="picurl[]">'
            obj.insertAdjacentHTML('beforebegin', html)
        }

        //删除实例
        function del(id) {
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/CenterWork') }}" + '/' + id,
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