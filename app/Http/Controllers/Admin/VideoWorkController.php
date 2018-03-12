<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\VideoWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideoWork::all();
        return view('Admin.Video.work', compact('videos'));
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
        VideoWork::create($video);
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
        $video = VideoWork::find($id);
        $data = [
            'status' => '200',
            'video' => $video['video'],
            'title' => $video['title'],
            'author' => $video['author'],
            'sort' => $video['sort']
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
        $video = VideoWork::find($id);
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
}
