<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入Input
use Input;
//引入模型
use App\Admin\Auth;

use DB;
class AuthController extends Controller
{
    //权限列表
    public function index()
    {
        // 查询数据到权限列表中展示
        // select t1.*,t2.auth_name as parent_name from auth as t1 left join auth as t2 on t1.pid = t2.id;
        $data=DB::table('auth as t1') -> select('t1.*','t2.auth_name as parent_name') -> leftJoin('auth as t2','t1.pid','=','t2.id') -> get();
        return view('admin.auth.index',compact('data'));
    }
    //权限添加
    public function add()
    {
        //判断请求类型
        if (Input::method() == 'POST') {
            // 处理数据
            // 如果需要验证数据可以仿照之前的规则去实现验证
            // 接收数据进入数据表  排除csrf——token的值
            $data=Input::except('_token');
            $result=Auth::insert($data);
            // 由于框架自身不支持相应bool值，所以转化一种形式
            return $result ? '1' : '0';
        }else {
            //查询父级权限
            $parents = Auth::where('pid','=','0')->get();
            return view('admin.auth.add',compact('parents'));
        }
    }
}
