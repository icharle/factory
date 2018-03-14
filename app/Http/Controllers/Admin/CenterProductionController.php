<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\CenterProduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = CenterProduction::all();
        return view('Admin.Center.production', compact('products'));
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
        $file = $request->file('pic');
        if (isset($file) && $file->isValid()) {                 //如果存在文件则执行下列条件
            $originalName = $file->getClientOriginalName();     // 文件原名

            $path = $file->move('upload/center/production/', $originalName);   //保存文件

            $res['picurl'] = '/upload/center/production/' . $originalName;          //图片路径
            $res['time'] = $data['time'];                                       //时间
            $res['title'] = $data['title'];                                     //标题
            $res['sort'] = $data['sort'];                                       //类别(0为web 1为Android 2为iOS 3为海报 4为UI设计 5为街坊视频 6为摄影视频)
            $res['center'] = $data['center'];                             //中心(0为技术研发中心 1为文化传媒中心)
            $res['author'] = $data['author'];                             //作者
            $res['video_url'] = '0';                             //视频链接默认为0，表示有图片情况下不能有视频

        } else {
            $res['picurl'] = '0';                                       //图片为空
            $res['time'] = $data['time'];                                       //时间
            $res['title'] = $data['title'];                                     //标题
            $res['sort'] = $data['sort'];                                       //类别(0为web 1为Android 2为iOS 3为海报 4为UI设计 5为街坊视频 6为摄影视频)
            $res['center'] = $data['center'];                             //中心
            $res['author'] = $data['author'];                             //作者
            $res['video_url'] = $data['video_url'];                             //视频链接默认为0，表示有图片情况下不能有视频
        }

        CenterProduction::create($res);                  //保存数据库中

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
        $product = CenterProduction::find($id);
        if ($product->delete()) {
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
}
