<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\CenterBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = CenterBanner::all();
        return view('Admin.Center.banner', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $file = $request->file('banner');
        if ($file->isValid()) {
            $originalName = $file->getClientOriginalName();     // 文件原名

            $path = $file->move('upload/center/banner/', $originalName);   //保存文件

            $res['picurl'] = '/upload/center/banner/' . $originalName;          //图片路径
            $res['time'] = $data['time'];                                       //时间
            $res['title'] = $data['title'];                                     //标题
            $res['sort'] = $data['sort'];                                       //中心
            $res['direction'] = $data['direction'];                             //方向
            $res['description'] = $data['description'];                         //描述

            CenterBanner::create($res);                  //保存数据库中
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = CenterBanner::find($id);
        if ($banner->delete()) {
            $data = [
                'status' => '200',
                'msg' => '删除成功'
            ];
        } else {
            $data = [
                'status' => '501',
                'msg' => '删除失败'
            ];
        }
        return $data;
    }

    /**
     * @param $id
     * @return array
     * 是否启用按钮
     */
    public function isUse(Request $request, $id)
    {
        $sort = $request->except('_token');
        $condition['isshow'] = 1;
        $condition['sort'] = $sort;
        $total = CenterBanner::where($condition)->count();       //已启用的总数(限制4个banner)
        if ($total > 4) {
            $data = [
                'status' => '503',
                'msg' => '超过banner数限制'
            ];
        } else {
            //更改属性
            $banner = CenterBanner::find($id);
            if ($banner['isshow'] == 1) {
                $data['isshow'] = 0;
            } else {
                $data['isshow'] = 1;
            }
            $res = CenterBanner::where('id', $id)->update($data);     //更新表字段
            if ($res) {
                $data = [
                    'status' => '200',
                    'msg' => '更改成功'
                ];
            } else {
                $data = [
                    'status' => '501',
                    'msg' => '更改失败'
                ];
            }
        }
        return $data;
    }
}
