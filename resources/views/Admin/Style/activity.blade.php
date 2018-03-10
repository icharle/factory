@extends('Admin.index')
@section('content')
    <div>
        <h3 class="page-header">操作</h3>
        <ol class="breadcrumb">
            <li><a href="#" data-toggle="modal" data-target="#myModal">添加活动记录</a></li>
        </ol>
        <h3 class="page-header">列表</h3>

        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <img src="http://kidultyx.com/factory_2018/image/item1.png">
                    <div class="caption">
                        <div>
                            <label>时间：</label>2018-04-03
                        </div>
                        <div>
                            <label>标题：</label>技术研发中心
                        </div>
                        <div>
                            <label>描述：</label>技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心技术研发中心
                        </div>
                        <p>
                            <a href="#" class="btn btn-info " data-toggle="modal" data-target="#myModal"
                               role="button">编辑</a>
                            <a href="#" class="btn btn-danger" role="button">删除</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            添加活动记录
                        </h4>
                    </div>
                    <form class="form-horizontal" role="form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="pic" class="col-sm-2 control-label">图片：</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control" id="pic" name="pic[]">
                                    <button type="button" class="btn btn-primary" onclick="addInput(this)"><span
                                                class="glyphicon glyphicon-plus"></span></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-sm-2 control-label">时间：</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="time" name="time"
                                           placeholder="2018-04-03">
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
                            <button type="button" class="btn btn-primary">
                                提交
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        //添加
        function addInput(obj){
            html = '<input type="file" class="form-control" id="pic" name="pic[]">'
            obj.insertAdjacentHTML('beforebegin',html)
        }
    </script>
@endsection