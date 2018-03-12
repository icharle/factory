@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加作品</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        @if( $product['picurl'] != '0' )<img
                                src="{{ $product->picurl }}">@elseif( $product['video_url'] != '0' )
                            <iframe class="embed-responsive-item"
                                    src="https://v.qq.com/iframe/player.html?vid={{ $product->video_url }}&tiny=0&auto=0"></iframe>@endif
                        <div class="caption">
                            <div>
                                <label>中心：</label>@if( $product['center'] == 0 )技术研发中心@elseif( $product['center'] == 1 )
                                    文化传媒中心@endif
                            </div>
                            <div>
                                <label>标题：</label>{{ $product->title }}
                            </div>
                            <div>
                                <label>分类：</label>@if( $product['sort'] == 0 )Web
                                @elseif( $product['sort'] == 1 )Android
                                @elseif( $product['sort'] == 2 )iOS
                                @elseif( $product['sort'] == 3 )海报
                                @elseif( $product['sort'] == 4 )UI设计
                                @elseif( $product['sort'] == 5 )街坊视频
                                @elseif( $product['sort'] == 6 )摄影视频
                                @endif
                            </div>
                            <div>
                                <label>时间：</label>{{ $product->time }}
                            </div>
                            <p>
                                <a href="#" class="btn btn-info " data-toggle="modal" data-target="#myModal"
                                   role="button">编辑</a>
                                <a href="#" onclick="del( {{ $product->id }} )" class="btn btn-danger"
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
                    <form class="form-horizontal" role="form" action="{{ url('admin/CenterProduction') }}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="pic" class="col-sm-2 control-label">图片：</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" id="pic" name="pic">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="video_url" class="col-sm-2 control-label">视频链接：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="video_url" name="video_url">
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
                                <label for="title" class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="星名片">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="center" class="col-sm-2 control-label">中心：</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="center" id="center">
                                        <option value="0">技术研发中心</option>
                                        <option value="1">文化传媒中心</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort" class="col-sm-2 control-label">类别：</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="sort" id="sort">
                                        <option value="0">Web</option>
                                        <option value="1">Android</option>
                                        <option value="2">iOS</option>
                                        <option value="3">海报</option>
                                        <option value="4">UI设计</option>
                                        <option value="5">街坊视频</option>
                                        <option value="6">摄影视频</option>
                                    </select>
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

        //删除
        function del(id) {
            $.ajax({
                type: 'POST',
                url: "{{ url('admin/CenterProduction') }}" + '/' + id,
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