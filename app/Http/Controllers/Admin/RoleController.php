<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入模型
use App\Admin\Role;
use App\Admin\Auth;
use Input;

class RoleController extends Controller
{
    //展示角色列表
    public function index()
    {
        //查询
        $data=Role::get();
        //展示视图
        return view('admin.role.index',compact('data'));
    }
    public function add()
    {
        return view('admin.role.add');
    }

    // 分派权限功能
    public function assign()
    {
        //判断请求类型
        if (Input::method()=='POST') {
            // 接收数据
            $data=Input::only(['id','auth_id']);
            // 交给模型处理数据
            $role=new Role();
            // 输出返回结果  模型处理返回的是受影响的行数，不是bool值
            return $role -> assignAuth($data);
        }
        else {
            // 查询一级权限
            $top=Auth::where('pid','=','0')->get();
            // 查询二级权限
            $cat=Auth::where('pid','!=','0')->get();
            //获取当前角色具备的权限id集合
            $ids = Role::where('id','=',Input::get('id'))->value('auth_ids');
            //展示视图
            return view('admin.role.assign',compact('top','cat','ids'));
        }
    }

}
