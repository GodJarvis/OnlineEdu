<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PublicController extends Controller
{
    //登录页面，返回登录视图
    public function login()
    {
        //展示视图
        return view('admin.public.login');
    }


    //验证数据
    public function check(Request $request)
    {
        // 开始自动验证
        $this->validate($request,[
            // 验证规则语法：需要验证的字段名=>'验证规则1|验证规则2:20'
            // 用户名，必填，长度介于2-20
            'username'=>'required|min:2|max:20',
            // 密码，必填，长度至少是6
            'password'=>'required|min:6',
            // 验证码，必填，长度5，必须是合法的
            'captcha'=>'required|size:4|captcha'
        ]);
        //继续进行数据库的验证，引入守门员
        // data是需要验证的数据，获取请求过来的用户名和密码,这两个也是需要验证的数据
        $data=$request->only(['username','password']);
        // 数据库中还有一个status需要验证，1表示不启用，2表示启用，将status添加到需要验证的data中去
        $data['status']='2';
        // 使用auth门面，第二个参数表示一个状态详情请参考手册
        $result=Auth::guard('admin')->attempt($data,$request->get('online'));
        if ($result) {
            // 跳转到后台页面
            return redirect('/admin/index/index');
        } else {
            // 跳转到登录页面
            return redirect('/admin/public/login')->withErrors([
                'loginError' => '用户名或密码错误'
            ]);
        }

    }

    // 用户退出界面
    public function logout()
    {
        // 退出
        Auth::guard('admin')->logout();
        // 跳转到登录页面
        return redirect('admin/public/login');
    }

}
