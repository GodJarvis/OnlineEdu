<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        //首页
        return view('admin.index.index');
    }
    public function welcome()
    {
        //首页--框架页面
        return view('admin.index.welcome');
    }
}
