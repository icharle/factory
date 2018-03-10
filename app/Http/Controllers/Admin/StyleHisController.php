<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\StyleHis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StyleHisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historys = StyleHis::all();
        return view('Admin.Style.graduate', compact('historys'));
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
        $history = $request->all();
        $avatar = $request->file('avatar');
        if ($avatar->isValid()) {
            $originalName = $avatar->getClientOriginalName();     // 文件原名

            $path = $avatar->move('upload/style/avatar/', $originalName);   //保存文件

            $res['picurl'] = '/upload/style/avatar/' . $originalName;           //图片路径
            $res['year'] = $history['year'];                                       //年份
            $res['username'] = $history['username'];                                   //姓名
            $res['oldoffice'] = $history['oldoffice'];                             //曾任
            $res['newoffice'] = $history['newoffice'];                         //现任

            StyleHis::create($res);             //存库处理
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
        $history = StyleHis::find($id);
        if ($history->delete()) {
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
