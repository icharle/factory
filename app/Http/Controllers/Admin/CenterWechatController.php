<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\CenterWechat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CenterWechatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $page = 1;                  //默认为第一页

        if (isset($data['page'])) {      //第一次加载页面不带page参数时，默认你执行下面代码
            $page = $data['page'] ? $data['page'] : 1;
        }

        $wechats = CenterWechat::all();
        return view('Admin.Center.wechat', compact('page', 'wechats'));
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
        $wechat = $request->except('_token');

        if (!CenterWechat::where('time', $wechat['time'])->first() && CenterWechat::count() < 13) {
            //由于微信公众号设置请求头，无法直接通过链接访问，则采用先保存本地的方法
            $save_file = 'upload/center/wechat/' . $wechat['time'] . '.png';
            $content = file_get_contents($wechat['thumb_url']);
            $save = file_put_contents($save_file, $content);

            $wechat['save_file'] = '/' . $save_file;

            CenterWechat::create($wechat);

            $data = [
                'status' => '200',
                'msg' => '更新成功'
            ];
        } else {

            $data = [
                'status' => '503',
                'msg' => '更新失败'
            ];

        }

        return $data;

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
        $wechat = CenterWechat::find($id);
        unlink(base_path() . '/public' . $wechat['save_file']);
        if ($wechat->delete()) {
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
