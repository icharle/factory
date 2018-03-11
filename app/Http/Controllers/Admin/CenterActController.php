<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\CenterAct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitys = CenterAct::all();
        //多个图片情况下，只显示第一张图片
        $picurl = array();
        foreach ($activitys as $activity) {
            $temp = explode(',', $activity['picurl']);
            $picurl[] = $temp['0'];
        }
        return view('Admin.Center.activity', compact('activitys', 'picurl'));
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
        $picurls = $request->file('picurl');
        $imgurl = '';      //存储图片链接
        foreach ($picurls as $picurl) {
            if ($picurl->isValid()) {
                $originalName = $picurl->getClientOriginalName();     // 文件原名
                $path = $picurl->move('upload/center/activity/', $originalName);   //保存文件
                $imgurl = $imgurl . '/upload/center/activity/' . $originalName . ',';
            }
        }
        $imgurl = substr($imgurl, 0, strlen($imgurl) - 1);      //去除最后一位','

        //插库处理
        $res['picurl'] = $imgurl;                           //图片链接
        $res['time'] = $data['time'];                       //活动时间
        $res['sort'] = $data['sort'];                       //类别(技术：0 文化：1 运策：2)
        $res['title'] = $data['title'];                     //标题
        $res['description'] = $data['description'];         //描述
        CenterAct::create($res);
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
        $activity = CenterAct::find($id);
        if ($activity->delete()) {
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
