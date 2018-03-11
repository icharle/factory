<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\VideoBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideoBanner::all();
        return view('Admin.Video.banner', compact('videos'));
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
        $video = $request->except('_token');
        VideoBanner::create($video);

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
        $video = VideoBanner::find($id);
        $data = [
            'status' => '200',
            'video' => $video['video'],
            'title' => $video['title'],
            'author' => $video['author'],
            'time' => $video['time'],
            'people' => $video['people'],
            'description' => $video['description']
        ];
        
        return $data;
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
        $video = VideoBanner::find($id);
        if ($video->delete()) {
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
        $total = VideoBanner::where('isshow', 1)->count();       //已启用的总数(限制1个banner)
        if ($total > 1) {
            $data = [
                'status' => '503',
                'msg' => '超过banner数限制'
            ];
        } else {
            //更改属性
            $video = VideoBanner::find($id);
            if ($video['isshow'] == 1) {
                $data['isshow'] = 0;
            } else {
                $data['isshow'] = 1;
            }
            $res = VideoBanner::where('id', $id)->update($data);     //更新表字段
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
