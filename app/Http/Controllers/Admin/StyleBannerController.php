<?php

namespace App\Http\Controllers\Admin;


use App\Model\Admin\StyleBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class StyleBannerController
 * @package App\Http\Controllers\Admin
 * 组织面貌banner
 */
class StyleBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = StyleBanner::all();
        return view('Admin.Style.banner', compact('banners'));
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
     * 保存相关信息
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $file = $request->file('banner');
        if ($file->isValid()) {
            $originalName = $file->getClientOriginalName();     // 文件原名

//            $realPath = $file->getRealPath();   //临时文件的绝对路径
//            $entension = $file->getClientOriginalExtension();   // 上传文件的后缀
//            $newName = $originalName;        //文件名

            $path = $file->move('upload/style/banner/', $originalName);   //保存文件

            $res['picurl'] = '/upload/style/banner/' . $originalName;           //图片路径
            $res['time'] = $data['time'];                                       //时间
            $res['center'] = $data['center'];                                   //中心
            $res['direction'] = $data['direction'];                             //方向
            $res['description'] = $data['description'];                         //描述

            StyleBanner::create($res);                  //保存数据库中
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
     * 编辑实例
     */
    public function edit($id)
    {
        $banner = StyleBanner::find($id);
        $data = [
            'status' => '200',
            'picurl' => $banner['picurl'],
            'time' => $banner['time'],
            'center' => $banner['center'],
            'direction' => $banner['direction'],
            'description' => $banner['description']
        ];

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * 更新实例
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * 删除实例
     */
    public function destroy($id)
    {
        $banner = StyleBanner::find($id);
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
    public function isUse($id)
    {
        $total = StyleBanner::where('isshow', 1)->count();       //已启用的总数(限制4个banner)
        if ($total > 4) {
            $data = [
                'status' => '503',
                'msg' => '超过banner数限制'
            ];
        } else {
            //更改属性
            $banner = StyleBanner::find($id);
            if ($banner['isshow'] == 1) {
                $data['isshow'] = 0;
            } else {
                $data['isshow'] = 1;
            }
            $res = StyleBanner::where('id', $id)->update($data);     //更新表字段
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
