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
            if ($user && $user->username == $username && decrypt($user->password) == $password) {
                return redirect('admin/index');
            } else {
                return redirect()->back()->with('error', '用户名或者密码错误');
            }
        }
    }

    public function index()
    {
        return view('Admin.index');
    }
}
