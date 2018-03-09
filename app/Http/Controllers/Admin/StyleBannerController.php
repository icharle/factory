<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        return view('Admin.Style.banner');
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

            $path = $file->move('upload/style/banner/', $originalName);   //完整路径
            $res['picurl'] = '/upload/style/banner/' . $originalName;

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
        //
    }
}
