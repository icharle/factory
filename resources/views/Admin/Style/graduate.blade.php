@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加星人</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            @foreach($historys as $history)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $history->picurl }}">
                        <div class="caption">
                            <div>
                                <label>姓名：</label>{{ $history->username }}
                            </div>
                            <div>
                                <label>曾任：</label>{{ $history->oldoffice }}
                            </div>
                            <div>
                                <label>现任：</label>{{ $history->newoffice }}
                            </div>
                            <p>
                                {{--<a href="javascript:void(0);" class="btn btn-info " data-toggle="modal" data-target="#myModal"--}}
                                   {{--role="button">编辑</a>--}}
                                <a href="javascript:void(0);" onclick="del( {{ $history->id }} )" class="btn btn-danger"
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
                            添加星人
                        </h4>
                    </div>
                    <form class="form-horizontal" role="form" action="{{ url('admin/StyleHis') }}" method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="avatar" class="col-sm-2 control-label">头像：</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="year" class="col-sm-2 control-label">年份：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="year" name="year" placeholder="2018">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="username" name="username"
                                           placeholder="xxx">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="oldoffice" class="col-sm-2 control-label">曾任：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="oldoffice" name="oldoffice"
                                           placeholder="CEO">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newoffice" class="col-sm-2 control-label">现任：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="newoffice" name="newoffice"
                                           placeholder="腾讯">
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
                url: "{{ url('admin/StyleHis') }}" + '/' + id,
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function (data) {
                    if (data.status == 200) {
                        layer.msg('删除成功', {icon: 6});
                        window.location.href = "{{ url('admin/StyleHis') }}";
                    } else if (data.status == 501) {
                        layer.msg('删除失败', {icon: 5});
                    }
                }
            });
        }
    </script>
@endsection