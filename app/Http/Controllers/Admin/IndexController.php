<?php

namespace App\Http\Controllers\Admin;


use App\Model\Admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 后台登录
     */
    public function login()
    {
        return view('Admin.login');
    }


    /**
     * @param Request $request
     * 登录验证
     */
    public function logincheck(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $password = $request->input('password');

            $user = User::where('username', '=', $username)->first();
            if ($user && $user->username == $username && $user->password == md5($password)) {

                session(['username' => $username]);      //登录成功，记录session

                return redirect('admin/index');         //进行跳转
            } else {
                return redirect()->back()->with('error', '用户名或者密码错误');
            }
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登录成功后跳转管理页面
     */
    public function index()
    {
        return view('Admin.index');
    }


    /**
     * 退出登录
     */
    public function logout()
    {
        session(['username' => '']);      //退出登录，删除session
        return redirect('admin');
    }
}
